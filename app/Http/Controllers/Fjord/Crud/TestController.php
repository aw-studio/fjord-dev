<?php

namespace App\Http\Controllers\Fjord\Crud;

use Fjord\Fjord\Models\FjordUser;
use Fjord\Form\Controllers\CrudController;

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
