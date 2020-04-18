<?php

namespace App\Models;

use Fjord\Crud\Models\CrudModel;

class Comment extends CrudModel
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
