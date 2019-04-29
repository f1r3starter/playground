Create index:

```json
PUT test_index
```

Create document:
```json
POST test_index/_doc
{
    "user" : "test",
    "post_date" : "2019-11-15T14:12:12",
    "message" : "trying out Elasticsearch",
    "counter": 3
}
```

Or if we have desired id:
```json
PUT test_index/_doc/1
{
    "user" : "test",
    "post_date" : "2019-11-15T14:12:12",
    "message" : "trying out Elasticsearch",
    "counter": 3
}
```

Partial update:
```json
POST test_index/_update/1
{
  "_doc" : {
    "user": "test2"
  }
}

```

Scripted update:
```json
POST test_index/_update/1
{
  "script": {
    "source": "ctx._source.counter += params.count",
    "params": {
      "count": 3
    }
  }
}

```
