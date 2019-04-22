<?php

namespace App\Mapper;

class AnnotationMapper implements Mapper
{
    private const DOC_BLOCK_PATTERN = "#(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_].*)#";

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
            $property->getDocComment();
            $property->getValue();
        }
    }


    private function parseDocBlock()
    {
        preg_match_all($pattern, $comment_string, $matches, PREG_PATTERN_ORDER);
    }
}
