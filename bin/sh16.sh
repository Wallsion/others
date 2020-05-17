#!/bin/bash
#	Program:
#	(for do done) usage
#  History:
#  2017/10/20 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
users=$(cut -d ":" -f 1 /etc/passwd )
for username in $users
do
	id $username
	finger $username
done 
