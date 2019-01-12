#!/bin/bash

#!/bin/bash
set -eo pipefail

host="$(hostname --ip-address || echo '127.0.0.1')"

if health="$(curl -fsSL "http://$host:9200/_cat/health?h=status")"; then
	health="$(echo "$health" | sed -r 's/^[[:space:]]+|[[:space:]]+$//g')" # trim whitespace (otherwise we'll have "green ")
	if [ "$health" = 'green' ]; then
		exit 0
	fi
	echo >&2 "unexpected health status: $health"
fi

exit 1

curl -X PUT "elasticsearch:9200/_template/filebeat" -H 'Content-Type: application/json' -d'
    {
      "index_patterns": ["filebeat*"],
      "settings": {
        "number_of_shards": 1
      },
      "mappings": {
        "_doc": {
          "_source": {
            "enabled": false
          },
          "properties": {
            "host_name": {
              "type": "keyword"
            },
            "created_at": {
              "type": "date",
              "format": "EEE MMM dd HH:mm:ss Z YYYY"
            }
          }
        }
      }
    }
    '