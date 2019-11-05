FROM nginx:latest
RUN rm /etc/nginx/conf.d/*
COPY www.conf /etc/nginx/conf.d/default.conf
VOLUME /var/log/nginx
#docker kill $(docker ps -q)
#docker rm $(docker ps --filter=status=exited --filter=status=created -q)
#docker rmi $(docker images -a -q) --force
