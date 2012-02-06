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

def clearString (txt):
	txt = re.sub('\s*-\s*','',txt)

	return txt

db = conectar()
cursor = db.cursor()
cursor.execute("""select * from anunciante""")
allrows = cursor.fetchall()

data_to_store = []

for row in allrows:
	numcols = len(row)
	comandosql = 'insert into resumo (idanunciante, descricao) values (DATASQL);'
	datasql = '%s, "' % row[0]
	for k in range(1, numcols):
		tmp = str(row[k])
		tmp = re.sub('\(',' ', tmp)
		tmp = re.sub('\)',' ', tmp)
		print '%s' % tmp
		if (not (re.search(tmp, "not found", re.I))):
			datasql = datasql + ('%s ' % tmp)
	datasql = datasql + '"'
	datasql = datasql.replace('(', '')
	datasql = datasql.replace(')', '')
	comandosql = comandosql.replace('DATASQL', datasql)
	data_to_store.append(comandosql)
#	print '%s\n________________' % comandosql

print 'Cleaning data from Resumo'
execquery(cursor, 'delete from resumo')
db.commit()

for dt in data_to_store:
	execquery(cursor, dt)
	print 'OK ::> %s\n_______________' % dt

db.commit()
db.close()


