#!/bin/bash 
for i in `seq 200`;do
    if ((i%2==0)) ;then
        ./embeed11 -r resource -f caselist.txt -w 1.pcm -o 1 -m 0 -i 65040        
	else
	./embeed22 -r resource -f caselist.txt -w 1.pcm -o 1 -m 0 -i 65040
    fi
done
