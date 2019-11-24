<?php

require('./vendor/autoload.php');

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

$encoders = [new XmlEncoder(), new JsonEncoder()];
$normalizers = [new ObjectNormalizer()];

$serializer = new Serializer($normalizers, $encoders);

class Test {
    private $first;
    private $second;

    public function __construct(Field $first, Field $second)
    {
        $this->first = $first;
        $this->second = $first;
    }

    public function getFirst()
    {
        return $this->first;
    }

    public function getSecond()
    {
        return $this->second;
    }
}

class Field {
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

$obj = new Test(
    new Field('first'),
    new Field('second')
);

$serialized = $serializer->serialize($obj, JsonEncoder::FORMAT);

$normalizer = new ObjectNormalizer(null, null, null, new ReflectionExtractor());
$serializer = new Serializer([new DateTimeNormalizer(), $normalizer]);
$newObj = $serializer->deserialize($serialized, Test::class);
