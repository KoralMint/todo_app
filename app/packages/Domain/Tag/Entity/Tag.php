<?php

namespace Packages\Domain\Tag\Entity;

use Packages\Domain\Tag\ValueObject\TagId;
use Packages\Domain\Tag\ValueObject\TagName;

class Tag
{
    private TagId $id;
    private TagName $name;

    private function __construct(
        TagId $id, 
        TagName $name
    ) {
        $this->id = $id;
        $this->name = $name;
    }

    // get
    public function getId(): TagId { return $this->id; }

    public function getName(): TagName { return $this->name; }

    // set
    public function changeName(TagName $name): void
    {
        $this->name = $name;
    }

    public static function create(
        TagId $id, 
        TagName $name
    ): self {
        return new self($id, $name);
    }
}