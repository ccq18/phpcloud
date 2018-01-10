用法1和2的区别在于是直接使用脚本命令还是有脚本文件，即脚本是直接使用还是写在一个文件里
    选项
        -W 表示一些特殊选项（还没怎么用到过）
        -F 表示分隔符
        -v 定义变量，或给变量赋值
        -f  使用脚本
    特殊变量
        NF    每行的字段数
        NR    当前处理行
        FS    分隔符
    脚本形式：
        An  AWK  program  is  a sequence of pattern {action} pairs and function  definitions.
        即又[条件][动作] [条件][动作]...组成
        [条件]支持逻辑运算符 < > = >= <= ==
        支持格式化输出和if语句

##  测试数据    stu.txt


No. Name    Chinese Math  
001 Jack    80  85  
002 Jane    90  90  
003 Ben 85  90  
004 Alice   85  95   


## 输出行号，第1个字段、第3个字段、第4个字段
[python] view plain copy
windeal@ubuntu:~/Windeal/Test$ awk '{print "line:" NR "\t" $1 "\t" $3 "\t" $4}' stu.txt  
line:1  No. Chinese Math  
line:2  001 80  85  
line:3  002 90  90  
line:4  003 85  90  
line:5  004 85  95  
windeal@ubuntu:~/Windeal/Test$  


## 2.输出数学考90的同学

awk 'NR==1 {print} NR>1&&$4==90{print}' stu.txt  
## 3.支持格式化输出和if语句
awk '{if(NR==1) printf "%10s %10s %10s %10s %10s\n",$1,$2,$3,$4,"Sum"}\  
 NR>=2{Sum=$3+$4   
printf "%10s %10s %10s %10s %10s\n",$1,$2,$3,$4,Sum}' stu.txt