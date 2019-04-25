<?php

namespace App\Mapper\Structure;

class Column
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $propertyName;

    /**
     * @var bool
     */
    private $primary = false;

    /**
     * @var string|null
     */
    private $relatedClass = null;

    /**
     * @param string $columnName
     * @param string $propertyName
     * @param bool $primary
     * @param string|null $relatedClass
     */
    public function __construct(string $columnName, string $propertyName, bool $primary = false, string $relatedClass = null)
    {
        $this->name = $columnName;
        $this->propertyName = $propertyName;
        $this->primary = $primary;
        if ($relatedClass && !class_exists($relatedClass)) {
            throw new \InvalidArgumentException(sprintf('Related class %s does not exists', $relatedClass));
        }
        $this->relatedClass = $relatedClass;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPropertyName(): string
    {
        return $this->propertyName;
    }

    /**
     * @return bool
     */
    public function isPrimary(): bool
    {
        return $this->primary;
    }

    /**
     * @return string|null
     */
    public function getRelatedClass(): ?string
    {
        return $this->relatedClass;
    }
}
