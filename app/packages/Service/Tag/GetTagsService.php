<?php

namespace Packages\Service\Tag;

use Packages\Repository\TagRepositoryInterface;
use Packages\Domain\Search\Entity\Search;
use Illuminate\Support\Collection;

class GetTagsService
{
    private TagRepositoryInterface $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function execute(Search $searchEntity): Collection
    {
        return $this->tagRepository->selectTags($searchEntity);
    }
}