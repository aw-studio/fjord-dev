<?php

namespace FjordApp\Controllers\User;

use Fjord\User\Models\FjordUser;
use Illuminate\Database\Eloquent\Builder;
use Fjord\Crud\Controllers\CrudController;

class UserController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = FjordUser::class;

    /**
     * Authorize request for permission operation and authenticated fjord-user.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @param string $id
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation, $id = null): bool
    {
        if ($operation == 'update') {
            return $user->id == $id;
        }

        return $user->can("{$operation} fjord-users");
    }

    /**
     * Initial query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(): Builder
    {
        return $this->model::query();
    }
}
