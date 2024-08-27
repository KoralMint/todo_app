<?php

namespace Packages\Repository;

use Packages\Domain\Tag\Entity\Tag;
use Packages\Domain\Tag\ValueObject\TagId;
use Packages\Domain\Search\Entity\Search;
use Illuminate\Support\Collection;

interface TagRepositoryInterface
{
    public function createTag(Tag $tag): Tag;
    public function updateTag(Tag $tag): Tag;
    public function deleteTag(Tag $tag): Tag;
    public function selectTag(TagId $tagId): Tag;
    public function selectTags(Search $searchEntity): Collection;
}