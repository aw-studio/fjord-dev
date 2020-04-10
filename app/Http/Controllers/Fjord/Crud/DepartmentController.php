<?php

namespace App\Http\Controllers\Fjord\Crud;

use App\Models\Department;
use Fjord\Fjord\Models\FjordUser;
use Illuminate\Support\Facades\Request;
use Fjord\Form\Controllers\CrudController;
use Fjord\Form\Requests\CrudUpdateRequest;

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

    public function validateUpdate(CrudUpdateRequest $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);
    }
}
