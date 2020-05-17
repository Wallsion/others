#!/bin/bash
#	Program:
#	Usage of case and function
#  History:
#  2017/10/19 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
function printit()
{
echo -n "Your choice is "
}
case $1 in
"one")
printit;echo $1 | tr 'a-z' 'A-Z'
;;
"two")
printit;echo $1 | tr 'a-z' 'A-Z'
;;
"three")
printit;echo $1 | tr 'a-z' 'A-Z'
;;
*)
echo "you should do as $0 {one|two|three}"
;;
esac
