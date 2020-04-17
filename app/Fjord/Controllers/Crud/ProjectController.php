<?php

namespace App\Fjord\Controllers\Crud;

use App\Models\Project;
use Fjord\Crud\Controllers\CrudController;

class ProjectController extends CrudController
{
    protected $model = Project::class;
}
