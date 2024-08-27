<?php

namespace Packages\Domain\Task\ValueObject;

use Packages\Exceptions\ValueException;

class Content{
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
        if (strlen($value) > 1000) {
            throw new ValueException('Content is too long! '+strlen($value)+'/1000 characters');
        }

        return new self($value);
    }
}