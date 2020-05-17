#!/bin/bash
#Program:
#	This program shows the user's choice
# History:
# 2-17/10/18 Wangxin 	First release
PATH=/bin:/sbin:/usr/bin:usr/sbin:/usr/local/bin:usr/local/sbin:~/bin
export PATH
echo -e "The script name is   ==> $0"
echo -e "Total parameter number is  ==> $#"
shift
echo -e "The script name is   ==> $0"
echo -e "Total parameter number is  ==> $#"
shift 3
echo -e "The script name is   ==> $0"
echo -e "Total parameter number is  ==> $#"
[ $# -lt 2 ] && echo echo -e "The number of parameter is less than 2 Stop here" \
&& exit 0
echo -e "Your whole parameter is ==> $@"
echo -e "The 1st parameter  ==> $1"
echo -e "The 2nd parameter  ==> $2"

