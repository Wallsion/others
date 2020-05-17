#!/bin/bash
#	Program:
#	Using netstat and grep to detect WWW,SSH,FTP and MAIL services
#  History:
#  2017/10/19  Wangxin  First realse
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/locsl/sbin:~/bin
export PATH
echo -e "Now, I will detect you Linux server's services"
echo -e "WWW,SHH.FTP,MAIL will be detect"
testing=$(netstat -tuln | grep ":80")
if [ "$testing" != "" ]
then
echo "WWW is runing in your system!"
fi
testing=$(netstat -tuln | grep ":22")
if [ "$testing" != "" ]
then
echo "SSH is runing in your system!"
fi
testing=$(netstat -tuln | grep ":21")
if [ "$testing" != "" ]
then
echo "FTP is runing in your system!"
fi
testing=$(netstat -tuln | grep ":25")
if [ "$testing" != "" ]
then
echo "MAIL is runing in your system!"
fi
