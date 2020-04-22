<?php

namespace FjordApp\Controllers\Crud;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\CrudController;

class TestController extends CrudController
{
    /**
     * Crud model class name.
     *
     * @var string
     */
    protected $model = \App\Models\Test::class;

    /**
     * Authorize request for permission operation and authenticated fjord-user.
     * Operations: create, read, update, delete
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return $user->can("{$operation} tests");
    }
}
