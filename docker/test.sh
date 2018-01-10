#!/bin/sh
reply="this is a reply message that contains so many words so I have to split it to some parts"
#array="${reply:0:5} ${reply:5:5} ${reply:10:5} ${reply:15:5} ${reply:20:5}"
for i in $reply
do
echo "send sms with the message: $i"
done
#mkdir aaa
#set b= aa vvv cc
#cd aaa
##( seq 1 10 )
#for k in ${b}
#do
#   mkdir aaa${k}
#   cd aaa${k}
#   for l in $( seq 1 10 )
#   do
#       mkdir bbb${l}
#   done
#   cd ..

#done
a="1"
arr=($1)

para1=$arr
if [ ! -n "$para1" ]; then
  echo "IS NULL"
else
  echo "NOT NULL"
fi
