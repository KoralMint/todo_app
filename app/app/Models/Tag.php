<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Packages\Domain\Tag\Entity\Tag as TagEntity;
use Packages\Domain\Tag\ValueObject\TagId;
use Packages\Domain\Tag\ValueObject\TagName;

class Tag extends Model
{
    use HasFactory;
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public $incrementing = false;
    protected $keyType = 'string';

    public $fillable = [
        'tagId',
        'name',
    ];

    public function toEntity(): TagEntity
    {
        return new TagEntity(
            TagId::create($this->tagId),
            TagName::create($this->name),
        );
    }

    public function createByEntity(TagEntity $tagEntity): void
    {
        $this::create([
            'tagId' => $tagEntity->getId()->getValue(),
            'name' => $tagEntity->getName()->getValue(),
        ]);
    }
}
