#!/bin/bash
#	Program:
#	case usage
#  History:
#  2017/10/19 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
read -p "Input your choice:" choice
case $choice in
"one")
echo "your choice is one"
;;
"two")
echo "your choice is two"
;;
"three")
echo "your choice is three"
;;
*)
echo "you should do as $0 {one|two|three}"
;;
esac
