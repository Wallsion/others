#!/bin/bash
#	Program:
#	while usage
#  History:
#  2017/10/20 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
declare -i i=0
#declare -i sum
while [ $i -lt 100 ]
do
	i=$(($i+1))
	sum=$(($sum+$i))	
done 
echo -e "The result is $sum"
