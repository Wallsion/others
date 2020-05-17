#!/bin/bash
#	Program:
#	Check $1 is equal to "hello"
#  History:
#  2017/10/19 Wangxin  First realse
Path=/bin:/sbin:/usr/bin:/usr/sbin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
case $1 in
"hello")
echo "Hello,how are you?"
;;
"")
echo "You must input parameters, ex> {$0 someword}"
;;
*)
echo "The only parameter is 'hello', ex> {$0 hello}"
;;
esac
