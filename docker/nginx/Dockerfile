FROM nginx:1.18

RUN ln -sf /dev/stdout /var/log/nginx/access.log && ln -sf /dev/stderr /var/log/nginx/error.log

ADD systemio.conf /etc/nginx/conf.d/default.conf

VOLUME /var/log/nginx
