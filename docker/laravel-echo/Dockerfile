FROM alpine:latest

RUN apk update \
    && apk add --update nodejs nodejs-npm git \
    && npm install -g laravel-echo-server

ENTRYPOINT ["laravel-echo-server"]

CMD ["start", "dir=./docker/laravel-echo/"]