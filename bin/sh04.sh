#!/bin/bash
# Program:
#   This program will caculate the product of two numbers.
# History:
# 2017/10/14 Xinwang First release
PATH=bin/:/sbin:/usr/bin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
echo -e "You should input two integer numbers,I will cross them"
read -p "number one:" firnum
read -p "number two:" secnum
total=$(($firnum*$secnum))
echo -e "\nThe result of $firnum X $secnum is ==> $total"
printf '\a %i \n' "$total"
