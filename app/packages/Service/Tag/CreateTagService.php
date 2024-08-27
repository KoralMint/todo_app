<?php

namespace Packages\Service\Tag;

use Packages\Repository\TagRepositoryInterface;
use Packages\Domain\Tag\Entity\Tag;

class CreateTagService
{
    private TagRepositoryInterface $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute(Tag $tag): Tag
    {
        return $this->tagRepository->createTag($tag);
    }
}