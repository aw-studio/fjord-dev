<?php

namespace App\Models;

use Fjord\Crud\Models\CrudModel;

class Tag extends CrudModel
{
    public function departments_morphed_by_many()
    {
        return $this->morphedByMany('App\Models\Department', 'taggable');
    }
}
