<?php

namespace App\Http\Controllers\Fjord\Crud;

use Fjord\Fjord\Models\FjordUser;
use Fjord\Form\Controllers\CrudController;

class DepartmentController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = \App\Models\Department::class;

    /**
     * Authorize request for operation.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return $user->can("{$operation} departments");
    }
}
