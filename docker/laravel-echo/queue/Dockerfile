FROM php:7.2-alpine

ENV SCRIPT_ROOT /usr/bin/local

COPY start.sh $SCRIPT_ROOT/start.sh

RUN apk update \
    && apk add dos2unix bash \
    && dos2unix $SCRIPT_ROOT/start.sh \
    && cp $SCRIPT_ROOT/start.sh $SCRIPT_ROOT/start \
    && chmod u+x $SCRIPT_ROOT/start

CMD ["/usr/bin/local/start"]