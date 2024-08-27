<?php

namespace Packages\Domain\Task\ValueObject;

use Packages\Exceptions\ValueException;
use Illuminate\Support\Str;
// str -> uuid


class TaskId
{
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public static function generateRandomIDAndCreate(): self
    {
        return new self(Str::uuid());
    }

    public static function create(string $value): self
    {
        if (!Str::isUuid($value)) {
            throw new ValueException('TaskId is not a valid UUID');
        }

        return new self($value);
    }
}