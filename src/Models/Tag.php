<?php

namespace Laramate\Tag\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Laramate\Support\Slug\AutoCreateSlug;

class Tag extends Model
{
    use AutoCreateSlug;

    /**
     * The attribute to generate the slug from.
     *
     * @var string
     */
    protected $slug_from_column = 'name';

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Taggable relation.
     *
     * @return MorphTo
     */
    public function taggable(): MorphTo
    {
        return $this->morphTo();
    }
}
