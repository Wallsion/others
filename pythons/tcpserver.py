#!/user/bin/env python
from socket import *
from time import ctime
host = ""
port = 21567
bufsiz = 1024
addr = (host,port)
tcpsersock = socket(AF_INET,SOCK_STREAM)
tcpsersock.bind(addr)
tcpsersock.listen(5)
while True:
	print('waiting for connecting...')
	tcpclisock, addr = tcpsersock.accept()
	print("...connected from:", addr)
	while True:
		data = tcpclisock.recv(bufsiz).decode("utf-8")
		if not data:
			break
		fp = open('tcpfile.txt','a')
		fp.write(data + "\n")
		fp.close()
		tcpclisock.send(("[%s] %s" % (ctime(),data)).encode("utf-8"))
	tcpclisock.close()
tcpsersock.close()
