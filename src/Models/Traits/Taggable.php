<?php

namespace Laramate\Tag\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Laramate\Tag\Models\Tag;

trait Taggable
{
    /**
     * Related tags.
     *
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
