FROM alpine:3.8

RUN apk add --no-cache curl

RUN curl http://localhost:9200/

COPY 'create_template.sh' '/create_template.sh'

CMD["sh", "/create_template.sh"]
