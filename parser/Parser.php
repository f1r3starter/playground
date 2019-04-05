<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.csfd.cz/film/300902-bohemian-rhapsody/prehled/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

$headers = array();
$headers[] = 'Connection: keep-alive';
$headers[] = 'Cache-Control: max-age=0';
$headers[] = 'Save-Data: on';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.119 Safari/537.36';
$headers[] = 'Dnt: 1';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8';
$headers[] = 'Accept-Encoding: gzip, deflate, br';
$headers[] = 'Accept-Language: en-US;q=0.8,en;q=0.7,uk;q=0.6';
$headers[] = 'Cookie: nette-samesite=1; developers-ad=1;';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

$doc = new \DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($result);
print_r($doc->saveHTML());

