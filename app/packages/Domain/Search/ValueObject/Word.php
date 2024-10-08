<?php

namespace Packages\Domain\Search\ValueObject;

use Packages\Exceptions\ValueException;

class Word
{
    private const LENGTH = 50;
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
        if (mb_strlen($value) < self::LENGTH) {
            return new self($value);
        }

        throw new ValueException('Word length must be less than ' . self::LENGTH);
    }
}
