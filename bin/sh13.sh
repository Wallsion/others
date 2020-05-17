#!/bin/bash
#	Program:
#	while usage
#  History:
#  2017/10/20 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
while [ "$yn" != "yes" -a "$yn" != "YES" ]
do
	echo "please input yes/YES to stop this program!"
	read yn
done 
echo -e "OK,you put the right answer."
