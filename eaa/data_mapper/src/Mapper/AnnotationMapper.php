<?php

namespace App\Mapper;

class AnnotationMapper implements Mapper
{
    private const DOC_BLOCK_PATTERN = '/(?>\@Mapper\()?(?:(?<key>[^=,(\s]+)=(?<value>[^,|\)\s]+))+/';

    /**
     * @var \ReflectionClass
     */
    private $class;

    public function __construct(\ReflectionClass $class)
    {
        $this->class = $class;
    }

    public function mapFields(): array 
    {
        $fields = [];
        foreach ($this->class->getProperties() as $property) {
            $this->parseDocBlock($property->getDocComment());
        }
    }


    private function parseDocBlock(string $docBlock)
    {
        preg_match_all(self::DOC_BLOCK_PATTERN, $docBlock, $docParams, PREG_SET_ORDER, 0);

        foreach ($docParams as $docParam) {
            print_r($docParam['value']);
        }
    }
}
