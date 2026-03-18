<?php

namespace GraphQL;

class Enum
{
    public function __construct(protected string $name) {}

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * Construct an array of Enum instances from an array of strings
     * 
     * @param string[] $items
     * @return self[]
     */
    public static function array(array $items): array
    {
        return array_map(fn($item) => new static($item), $items);
    }
}
