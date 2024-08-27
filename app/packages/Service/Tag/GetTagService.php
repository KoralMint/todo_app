<?php

namespace Packages\Service\Tag;

use Packages\Repository\TagRepositoryInterface;
use Packages\Domain\Tag\Entity\Tag;
use Packages\Domain\Tag\ValueObject\TagId;

class GetTagService
{
    private TagRepositoryInterface $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute(TagId $tagId): Tag
    {
        return $this->tagRepository->selectTag($tagId);
    }
}