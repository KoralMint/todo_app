<?php

namespace Packages\Domain\Task\ValueObject;

use Packages\Exceptions\ValueException;

enum Status: int
{
    case INCOMPLETE = 0;
    case COMPLETED = 1;

    public static function create(int $value): self
    {
        if ($value < 0 || $value > 1) {
            throw new ValueException('Status must be 0 or 1');
        }

        return self::from($value);
    }
}