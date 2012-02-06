#!/usr/bin/python


# get data of services from http://www.manausonline.com.br
# afeter that, extract and map them to db
#

import sys
import urllib2
import re

def getLinks(urlbase):
    pattern_topo = re.compile('<!--INICIO DO TOPO-->(.*)<!--FIM DO TOPO-->.*')
    pattern_links = re.compile('<li><a href="(.+?)">')
    html_topo = pattern_topo.search(urlbase)
    tmplinks = []
    if (html_topo):
       tmplinks = pattern_links.findall(html_topo.group(1))

    links = []
    for i in tmplinks:
       if not (re.search('.*class.*', i)):
           links.append(i)

    return links


def checaPagina(url):
	try:
		html = urllib2.urlopen('%s' % (url))
		htmlx = html.read().replace('\n',' ').replace('\r',' ')
		print 'OK --> checaPagina :: %s' % url
		return htmlx
	except urllib2.HTTPError, e:
		urllib2.HTTPError.__str__(e)
		return False


urlbase = 'http://www.manausonline.com/'
dirurlbase = 'manausonline.com/'
#htmlbase = checaPagina(urlbase)
htmlbase = (open(sys.argv[1])).read().replace('\n', ' ').replace('\r', ' ')
lista_links_coletar = getLinks(htmlbase)

id = 1
for i in lista_links_coletar:
   xurl = urlbase + i
   print 'Crawling for: %s' % xurl
   htmlx = checaPagina(xurl)
   if htmlx:
       tmp = open(('%spage%d.html' % (dirurlbase, id)), 'w')
       tmp.write(htmlx);
       tmp.close();
       print 'OK...'
       id = id + 1
   else:
       print 'Page Not found...'


