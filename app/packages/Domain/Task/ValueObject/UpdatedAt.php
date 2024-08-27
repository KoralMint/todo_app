<?php

namespace Packages\Domain\Task\ValueObject;

use Packages\Exceptions\ValueException;
use Carbon\CarbonImmutable;
use Throwable;

class UpdatedAt
{
    private CarbonImmutable $value;

    private function __construct(CarbonImmutable $value)
    {
        $this->value = $value;
    }

    public function getValue(): CarbonImmutable
    {
        return $this->value;
    }

    public static function createWithConversion(string $value): self
    {
        try {
            $convertedValue = new CarbonImmutable($value);
        } catch (Throwable $e) {
            throw new ValueException('Invalid date format: UpdatedAt');
        }

        return new self($convertedValue);
    }

    public static function createNow(): self
    {
        return new self(CarbonImmutable::now());
    }

    public static function createEmpty(): self
    {
        return new self(CarbonImmutable::create(0, 0, 0, 0, 0, 0));
    }
    
    public static function create(CarbonImmutable $value): self
    {
        return new self($value);
    }
}