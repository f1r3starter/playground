<?php

require('../vendor/autoload.php');

$cache = new \App\Cache\Cache(
    new \App\DB\DB(),
    new \App\Cache\MemoryCacheStorage()
);

print_r($cache->firstQuery());
print_r($cache->firstQuery());
print_r($cache->firstQuery());
print_r($cache->secondQuery());

//First was calledArray
//(
//    [0] => data1
//)
//Array
//(
//    [0] => data1
//)
//Array
//(
//    [0] => data1
//)
