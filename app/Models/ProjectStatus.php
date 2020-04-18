<?php

namespace App\Models;

use Fjord\Crud\Models\CrudModel;

class ProjectStatus extends CrudModel
{
    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = ['title'];
}
