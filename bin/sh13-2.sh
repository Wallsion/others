#!/bin/bash
#	Program:
#	until usage
#  History:
#  2017/10/20 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
until [ "$yn" == "yes" -o "$yn" == "YES" ]
do
	echo "please input yes/YES to stop this program!"
	read yn
done 
echo -e "OK,you put the right answer."
