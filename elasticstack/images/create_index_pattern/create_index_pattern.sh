#!/bin/bash

curl -f -XPOST -H "Content-Type: application/json" -H "kbn-xsrf: anything" \
  "http://kibana:5601/api/saved_objects/index-pattern/filebeat" \
  -d"{\"attributes\":{\"title\":\"filebeat*\",\"timeFieldName\":\"@timestamp\"}}" \

# Create the default index
curl -XPOST -H "Content-Type: application/json" -H "kbn-xsrf: anything" \
  "http://kibana:5601/api/kibana/settings/defaultIndex" \
  -d"{\"value\":\"filebeat\"}"