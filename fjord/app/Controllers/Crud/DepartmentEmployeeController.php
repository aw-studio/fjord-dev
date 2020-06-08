<?php

namespace FjordApp\Controllers\Crud;

use App\Models\Employee;
use Fjord\User\Models\FjordUser;
use Illuminate\Database\Eloquent\Builder;
use Fjord\Crud\Controllers\CrudController;

class DepartmentEmployeeController extends CrudController
{
    /**
     * Model class.
     *
     * @var string
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

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query($department_id): Builder
    {
        dd('', $department_id);
        return $this->model::query();
    }
}
