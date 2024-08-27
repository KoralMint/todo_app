<?php

namespace Packages\Domain\Tag\ValueObject;

use Packages\Exceptions\ValueException;

class TagName{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function create(string $value): self
    {
        if (strlen($value) > 100) {
            throw new ValueException('Tag name is too long! '+strlen($value)+'/100 characters');
        }

        return new self($value);
    }
}