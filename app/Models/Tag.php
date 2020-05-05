<?php

namespace App\Models;

use Fjord\Crud\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaContract;


class Tag extends Model
{
    use TrackEdits;

    protected $fillable = [
        'tag_id'
    ];

    public function departments_morphed_by_many()
    {
        return $this->morphedByMany(\App\Models\Department::class, 'taggable')->orderBy('order');
    }
}
