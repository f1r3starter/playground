FROM alpine:3.8

RUN apk add --no-cache curl

COPY create_index_pattern.sh /usr/local/bin/

RUN ["chmod", "+x", "/usr/local/bin/create_index_pattern.sh"]

ENTRYPOINT ["sh", "/usr/local/bin/create_index_pattern.sh"]
