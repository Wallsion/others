#!/bin/bash
# Program:
#   This program shows "hello world!" in your screen
# History:
# 2017/10/14 Xinwang First release
PATH=bin/:/sbin:/usr/bin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
read -p "please input your first name:" firstname
read -p "please input your second name:" secondname
echo -e "your fullname is: $firstname $secondname"

