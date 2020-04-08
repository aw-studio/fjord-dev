<?php

namespace App\Http\Controllers\Fjord\Crud;

use App\Models\Employee;
use Fjord\Fjord\Models\FjordUser;
use Fjord\Form\Controllers\CrudController;
use Fjord\Form\Controllers\Traits\CrudShowForm;
use Fjord\Form\Controllers\Traits\CrudShowPreview;
use Fjord\Form\Controllers\Traits\CrudIndexDeleteAll;

class EmployeeController extends CrudController
{
    /*
    use CrudIndexDeleteAll,
        CrudShowForm,
        CrudShowPreview,
        Actions\EmployeeActions;
    */

    protected $model = Employee::class;

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
        return $user->can("{$operation} employees");
    }
}
