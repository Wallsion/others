#!/bin/bash
#	Program:
#	You put demobilization date, I will caculate how many days before you demobilize.
#  History:
#  2017/10/19  Wangxin  First realse
PATH=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/locsl/sbin:~/bin
export PATH
echo -e "This program will try caculate :"
echo -e "How many days before you demobilization date"
read -p "Please input your demobilization date (YYMMDD ex>20171019):" date2
date_d=$(echo $date2 |grep '[0-9]\{8\}')
if [ "$date_d" == "" ]
then
echo "You put a wrong date format... ";exit 1
fi
declare -i date_dem=`date --date="$date2" +%s`
declare -i date_now=`date +%s`
declare -i date_total=$(($date_dem-$date_now))
declare -i date_d=$(($date_total/60/60/24))
if [ "$date_total" -lt "0" ]
then
echo "You had been denobilization before:" $((-1*$date_d)) "ago"
else
declare -i date_h=$(($(($date_total-$date_d*60*60*24))/60/60))
echo "You will demobilize after $date_d days $date_h hours"
fi
