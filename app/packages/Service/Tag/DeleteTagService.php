<?php

namespace Packages\Service\Tag;

use Packages\Repository\TagRepositoryInterface;
use Packages\Domain\Tag\Entity\Tag;
use Packages\Domain\Tag\ValueObject\TagID;

class DeleteTagService
{
    private TagRepositoryInterface $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute(TagId $tagId): Tag
    {
        $tag = $this->tagRepository->selectTag($tagId);
        return $this->tagRepository->deleteTag($tag);
    }
}