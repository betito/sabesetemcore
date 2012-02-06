#!/usr/bin/python


# get data of services from http://www.manausonline.com.br
# afeter that, extract and map them to db
#

import htmlentitydefs
import sys
import urllib2
import re
import MySQLdb
import os
import codecs

def conectar ():
	try:
		#Efetua a conexao com o banco de dados
		conn = MySQLdb.connect(host='localhost',user='root',passwd='adivinha',db='selfservice')
	except:
		pass
		#Executa uma query
	return conn

def execquery (conn, comando):
	try:
		conn.execute(comando)
	except:
		print 'Erro no Exec Query %s ' % comando

def getDataFor(patterns, attrib, txt):
	data = re.search(patterns, txt, re.I)
	if data:
		xdata = data.group(attrib).replace('\s+',' ')
		xdata = re.sub('^\s+','',xdata)
		xdata = re.sub('\s+$','',xdata)
		xdata = re.sub('&nbsp;','',xdata)

		return xdata

	return 'Not Found'

def clearString (txt):
	txt = re.sub('\s*-\s*','',txt)

	return txt

columndb = {}
columndb['senha'] =''
columndb['cep'] =''
columndb['logo'] =''
columndb['promocao'] =''
columndb['cardapio'] =''
columndb['delivery'] = 0
columndb['twitter'] =''
columndb['facebook'] =''
columndb['orkut'] =''
columndb['myspace'] =''
columndb['url'] =''
columndb['servico'] = 0
columndb['formasdepagamento'] = ''
columndb['informacoesadic'] =''
columndb['liberado'] = 0
columndb['nome'] =''
columndb['rua'] = ''
columndb['bairro'] = ''
columndb['cidade'] = 'manaus'
columndb['estado'] = 'AM'
columndb['telefone'] = ''
columndb['horarioatendimento'] = ''
columndb['email'] = ''
columndb['categoria'] = ''

patterns = {}
patterns['nome']='<strong>(?P<nome>.+?)</strong>'
patterns['rua']='endere.+?:(?P<rua>.+?)<br\s*/?>'
patterns['telefone']='telefone:(?P<telefone>.+?)<br\s*/?>'
patterns['horarioatendimento']='Funcionamento:(?P<horarioatendimento>.+?)<br\s*/?>'
patterns['bairro']='.*-\s+(?P<bairro>.*?)\s*$'
patterns['email']='.*mailto:(?P<email>.*?)"'
patterns['categoria']='.*<span class="cxtitulotopo">(?P<categoria>.*?)</span>.*'


#nome do diretorio onde estao as paginas coletadas com a barra do final'
urlbase = sys.argv[1]
arqs = os.listdir(urlbase)


content_start = re.compile('INICIO CONTEUDO\-\->(?P<anunc>.*)FIM CONTEUDO')

datatoinsert = []
#for i in range(1,len(arqs)):
#for i in range(1,2):
#	arq = arqs[i]
for arq in arqs:
	if re.search('.*page.*', arq):
			html = open('%s/%s' % (urlbase,arq))
			print '%s/%s' % (urlbase, arq)
			htmlx = html.read()
			
			htmlx = htmlx.replace('\n',' ')
			htmlx = htmlx.replace('\r',' ')
			content = content_start.search(htmlx)
			if content:
				columndb['categoria'] = getDataFor(patterns['categoria'],'categoria', htmlx)
		#		print '%s :: %s' % (arq, columndb['categoria'])
				xcontent = content.group('anunc')
				anuncios = re.findall ('<p>.+?<\/p>', xcontent)
				for an in anuncios:
					comandosql = 'insert into anunciante(CAMPOS) values (VALORES);'
					columndb['nome'] = getDataFor(patterns['nome'],'nome', an)
					columndb['rua'] = getDataFor(patterns['rua'], 'rua', an)
					columndb['bairro'] = getDataFor(patterns['bairro'], 'bairro', columndb['rua'])
					columndb['rua'] = columndb['rua'].replace(columndb['bairro'], '')
					columndb['rua'] = clearString(columndb['rua'])
					columndb['telefone'] = getDataFor(patterns['telefone'],'telefone', an)
					columndb['horarioatendimento'] = getDataFor(patterns['horarioatendimento'],'horarioatendimento', an)
					columndb['email'] = getDataFor(patterns['email'],'email', an)
				
					columndbkeys = columndb.keys()
					campos = ''
					valores = ''
					todos_valores = ''
					for cdbk in columndbkeys:
		#				print columndb[cdbk]
						campos = campos + cdbk + ','
						valores = valores + '"' + str(columndb[cdbk]) + '",'
					campos = campos[:len(campos)-1]	
					valores = valores [:len(valores)-1]	
					comandosql = comandosql.replace('CAMPOS', campos)
					comandosql = comandosql.replace('VALORES', valores)
					datatoinsert.append(comandosql)
		#			print '.................................'

print 'TOTAL:: %d' % len(datatoinsert)

db = conectar()
dbcur = db.cursor()
for dt in datatoinsert:
	execquery (dbcur, dt)
	print 'OK -> %s' % dt
	print '________________'

db.commit()
db.close()
