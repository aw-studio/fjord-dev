<?php

namespace App\Models;

use Fjord\Fjord\Models\Model as FjordModel;

class Tag extends FjordModel
{
    public function departments_morphed_by_many()
    {
        return $this->morphedByMany('App\Models\Department', 'taggable');
    }
}
