#!/bin/bash

while :
do
    if health="$(curl -s http://kibana:5601/api/status)"; then
        if [ "$health" != 'Kibana server is not ready yet' ]; then
            curl -f -XPOST -H "Content-Type: application/json" -H "kbn-xsrf: anything" \
              "http://kibana:5601/api/saved_objects/index-pattern/filebeat" \
              -d"{\"attributes\":{\"title\":\"filebeat*\",\"timeFieldName\":\"@timestamp\"}}" \

            curl -XPOST -H "Content-Type: application/json" -H "kbn-xsrf: anything" \
              "http://kibana:5601/api/kibana/settings/defaultIndex" \
              -d"{\"value\":\"filebeat\"}"
            exit 0
        fi
    fi
    sleep 10
done

exit 1