#!/bin/bash
# Program:
#   This program shows "hello world!" in your screen
# History:
# 2017/10/14 Xinwang First release
PATH=bin/:/sbin:/usr/bin:/usr/local/bin:/usr/local/sbin:~/bin
export PATH
echo -e "请输入文件名，判断文件是否存在和其权限："
read -p "输入一个文件名：" filename
test -z $filename && echo -e "你必须输入一个文件名！" && exit 0
test ! -e $filename && echo -e "你输入的文件 $filename 不存在" && exit 0
test -f $filename && echo -e "是个文件"
test -d $filename && echo -e "是个目录"
test -r $filename && echo -e " 可读"
test -w $filename && echo -e " 可写"
test -x $filename && echo -e " 可执行"

