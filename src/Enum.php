<?php

namespace GraphQL;

class Enum {
    public function __construct(protected string $name) {
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
