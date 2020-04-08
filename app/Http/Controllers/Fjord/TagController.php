<?php

namespace App\Http\Controllers\Fjord;

use Fjord\Form\Controllers\CrudController;

class TagController extends CrudController
{
    // Set this to false if you don't want to use permissions on this crud-model
    public const PERMISSIONS = false;

    protected $modelName = 'Tag';
}
