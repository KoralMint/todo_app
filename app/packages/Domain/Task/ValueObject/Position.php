<?php

namespace Packages\Domain\Task\ValueObject;

use Packages\Exceptions\ValueException;

class Position{
    private int $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public static function create(int $value): self
    {
        if ($value < 0) {
            throw new ValueException('Position must be greater than or equal to 0');
        }

        return new self($value);
    }
}