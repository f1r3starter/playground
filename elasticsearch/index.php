<?php

require('vendor/autoload.php');

const INIT = 1;
const PROCEED = 2;

$number = readline("Enter command number:\r\n1) Init elasticsearch\r\n2) Proceed data\r\n");

$application = new \Application\Main(
    new \Application\ElasticClient(\Elasticsearch\ClientBuilder::create()->build()),
    new \Application\StringProceeder(),
    'english_words',
    'words_alpha.txt',
    'words',
    'word'
);

if (INIT == $number) {
    $application->init();
} elseif (PROCEED == $number) {
    $application->proceed('result.csv');
}