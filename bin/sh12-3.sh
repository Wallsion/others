#!/bin/bash
#	Program:
#	case usage
#  History:
#  2017/10/19 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
function printit()
{
echo "Your choice is $1"
}
case $1 in
"one")
printit 1
;;
"two")
printit 2
;;
"three")
printit 3
;;
*)
echo "you should do as $0 {one|two|three}"
;;
esac
