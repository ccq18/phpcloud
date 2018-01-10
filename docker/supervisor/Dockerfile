FROM ubuntu:16.04
MAINTAINER examples@docker.io
ADD sources.list /etc/apt/
RUN  apt-get update  \
 && apt-get upgrade -y \
 && apt-get install -y openssh-server apache2 supervisor  \
 && mkdir -p /var/run/sshd  \
 && mkdir -p /var/log/supervisor
ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf
EXPOSE 22 80
CMD ["/usr/bin/supervisord"]
