<?php

namespace Packages\Domain\Task\ValueObject;

use Packages\Exceptions\ValueException;

class Priority{
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
        if ($value < 0 || $value > 2) {
            throw new ValueException('Priority must be 0, 1 or 2');
        }

        return new self($value);
    }
}