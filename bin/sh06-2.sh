#!/bin/bash
#Program:
#	This program shows the user's choice
# History:
# 2-17/10/18 Wangxin 	First release
PATH=/bin:/sbin:/usr/bin:usr/sbin:/usr/local/bin:usr/local/sbin:~/bin
export PATH
read -p "Please input (Y/N)" yn
if [ "$yn" == "Y" ] || [ "$yn" == "y" ]; then
	echo "OK, continue"
	exit 0;
fi
if [ "$yn" == "N" ] || [ "$yn" == "n" ]; then
	echo "Oh,interrupt!"
	exit 0;
fi
echo -e "I don't know what your choice is."
