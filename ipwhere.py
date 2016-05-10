#!/usr/bin/python
#coding=utf-8
import urllib2,urllib,sys,re

if len(sys.argv) < 2:
    print 'Usage: %s [ip]' % sys.argv[0]
    sys.exit(1)

class bcolors:
    HEADER = '\033[95m'
    OK_BLUE = '\033[94m'
    OK_GREEN = '\033[92m'
    WARING_YELLOW = '\033[93m'
    FAIL = '\033[36m'
    FLASHING = '\033[35m'
    CRITICAL_RED = '\033[31m'
    END = '\033[0m'


def getip_qq(ipaddr):
     url = 'http://ip.qq.com/cgi-bin/searchip?searchip1=%s' % ipaddr
     data = 'searchip1=' + ipaddr
     pat = re.compile('<span>(.*)</span></p>')
     html = urllib2.urlopen(url).read().decode('gb2312')
     print 'ip.qq.com:\t' + bcolors.OK_GREEN + ipaddr + bcolors.END + "\t\t" + bcolors.WARING_YELLOW + re.findall(pat,html)[0].replace('&nbsp;',' ') + bcolors.END

def getip_ip138(ipaddr):
    url = 'http://www.ip138.com/ips138.asp?ip=%s&action=2' % ipaddr
    pat = re.compile(r'<li>(.*)</li><li>(.*)</li>')
    html = urllib2.urlopen(url).read().decode('gb2312')
    result = re.findall(pat,html)
    print 'ip138.com:\t' + ipaddr + "\t\t" + result[0][0] + result[0][1]

def getip_cn(ipaddr):
    url = 'http://ip.cn/index.php?ip=%s' % ipaddr
    pat = re.compile('<code>(.*)</code>&nbsp;(.*)</p><p>(.*)</p>')
    html = urllib2.urlopen(url).read().decode('utf-8')
    result = re.findall(pat,html) 
    print 'ip.cn:\t\t' + ipaddr + "\t\t" + result[0][1].replace('</p><p>','')
    
if __name__ == '__main__':
      ipaddr = sys.argv[1]
      getip_qq(ipaddr)
      getip_ip138(ipaddr)
      getip_cn(ipaddr)
 
