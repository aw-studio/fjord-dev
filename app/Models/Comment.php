<?php

namespace App\Models;

use Fjord\Fjord\Models\Model as FjordModel;

class Comment extends FjordModel
{
    protected $fillable = ['body', 'commentable_id', 'commentable_type'];

    /**
     * Get the owning commentable model.
     */
    public function commentable()
    {
        return $this->morphTo();
    }
}
