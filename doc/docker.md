# docker基本使用
# 镜像
## 获取
docker pull ubuntu:16.04
## 列出
docker image ls
##  删除镜像
docker image rm [选项] <镜像1> [<镜像2> ...]
## 删除所有镜像
docker image rm $(docker image ls -a)
## 构建
docker build -t nginx:v3 .
# 实例
## 运行一个实例
 docker run --name webserver -d -p 801:80 nginx
 
-it ：这是两个参数，一个是 -i ：交互式操作，一个是 -t 终端。我们这里打算进入
bash 执行一些命令并查看返回结果，因此我们需要交互式终端。

-d 后台执行
## 查看实例列表
docker ps
## 访问
docker exec -it 69d1 bash
docker exec -it webserver bash

docker container ls -a

docker container stop
docker container start
docker container restart
docker container rm 
## 批量删除
docker rm $(docker ps -a -q) 
## 清理所有处于终止状态的容器
docker container prune
## 保存
docker commit --author "放肆 <348578429@qq.com>" --message "修改了默认网页" webserver nginx:v2

## 导入导出
docker export 7691a814370e > ubuntu.tar
cat ubuntu.tar | docker import - test/ubuntu:v1.0
docker import http://example.com/exampleimage.tgz example/imagerepo

# 数据券
## 新建
docker volume create my-vol

##
docker volume ls 
docker volume rm 
docker volume prune

## 挂载目录 

docker run -d -P --name web -v /src/webapp:/opt/webapp --mount type=bind,source=/src/webapp,target=/opt/webapp training/webapp python app.py
docker run -p 501:5000  --mount type=bind,source=$PWD/,target=/code  -d  python1 

## 绑定端口
-p 500:80

## 新建网络
docker network create -d bridge my-net

## 连接容器
docker run -it --rm --name busybox1 --network my-net busybox sh


docker run  -v $PWD/phpcode/phpcloud/code:/usr/src/myapp  -w /usr/src/myapp python:3.5 python helloworld.py


# docker-compose 
docker-compose build  --force-rm 
docker-compose up -d   
docker-compose stop
docker-compose start
