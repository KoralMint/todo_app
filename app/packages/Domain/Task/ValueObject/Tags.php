<?php

namespace Packages\Domain\Task\ValueObject;

use Packages\Exceptions\ValueException;
use Packages\Domain\Tag\Entity\Tag as TagEntity;

class Tags{
    private array $value;

    private function __construct(array $value)
    {
        $this->value = $value;
    }

    public function getValue(): array
    {
        return $this->value;
    }

    public static function create(array $value): self
    {
        $tags = [];

        foreach ($value as $tag) {
            if (!$tag instanceof TagEntity) {
                throw new ValueException('Invalid value: not TagEntity');
            }

            $tags[] = $tag;
        }

        return new self($tags);
    }
}