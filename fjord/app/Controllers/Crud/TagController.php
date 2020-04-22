<?php

namespace FjordApp\Controllers\Crud;

use App\Models\Tag;
use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\CrudController;

class TagController extends CrudController
{
    protected $model = Tag::class;

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
        return $user->can("{$operation} tags");
    }
}
