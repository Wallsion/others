#!/bin/bash
#	Program:
#	while usage
#  History:
#  2017/10/20 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
read -p "please input a integer, I will count for 1+2+3··\n" nu
sum=0;
for ((i=1;i<=$nu;i=i+1))
do
	sum=$(($sum+$i))
done
echo -e "The result is $sum"
