
## 在docker目录执行
docker run --name php5 -p 9000:9000 -v $PWD/php:/www -v $PWD/php/conf:/usr/local/etc/php -v $PWD/php/logs:/phplogs   -d php:5.6-fpm
docker run --name nginx1 -p 8011:80  -v $PWD/nginx/nginx.conf:/etc/nginx/nginx.conf -d --link php5:php5 nginx


 
 ## 查看容器ip
 docker inspect php5 |grep '"IPAddress"'
 

## todo容器互相访问 
 docker network create appnetwork
 将容器加入“User-defined network”
 
 docker network connect appnetwork php5
 
 docker network connect appnetwork nginx1
 测试容器互访
 
 docker exec php5 ping nginx1