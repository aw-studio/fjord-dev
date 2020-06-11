<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;

class Comment extends Model
{
    use TrackEdits;

    protected $fillable = ['body', 'commentable_id', 'commentable_type'];

    /**
     * Get the owning commentable model.
     * 
     * @return MorphTo
     */
    public function commentable()
    {
        return $this->morphTo('commentable');
    }
}
