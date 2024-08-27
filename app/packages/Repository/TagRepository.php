<?php

namespace Packages\Repository;

use App\Models\Tag as TagModel;
use Packages\Domain\Tag\Entity\Tag;
use Packages\Domain\Tag\ValueObject\TagId;
use Packages\Domain\Search\Entity\Search;
use Illuminate\Support\Collection;

class TagRepository implements TagRepositoryInterface
{
    public function createTag(Tag $tag): Tag
    {
        $tagModel = new TagModel();
        $tagModel->id = $tag->getId()->getValue();
        $tagModel->name = $tag->getName()->getValue();
        $tagModel->save();
        return $tag;
    }

    public function updateTag(Tag $tag): Tag
    {
        $tagModel = TagModel::find($tag->getId()->getValue());
        $tagModel->update([
            'name' => $tag->getName()->getValue()
        ]);
        return $tag;
    }

    public function deleteTag(Tag $tag): Tag
    {
        $tagModel = TagModel::find($tag->getId()->getValue());
        $tagModel->delete();
        return $tag;
    }

    public function selectTag(TagId $tagId): Tag
    {
        $tagModel = TagModel::find($tagId->getValue());
        return $tagModel->toEntity();
    }

    public function selectTags(Search $searchEntity): Collection
    {
        $query = TagModel::query();
        if ($searchEntity->getWords()->isExists()) {
            $query = $query->whereIn('name', $searchEntity->getWords()->getValue());
        }

        return $query->get()->map(function ($tagModel) {
            return $tagModel->toEntity();
        });
    }
}