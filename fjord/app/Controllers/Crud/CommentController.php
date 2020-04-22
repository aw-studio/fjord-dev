<?php

namespace FjordApp\Controllers\Crud;

use App\Models\Comment;
use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\CrudController;

class CommentController extends CrudController
{
    /**
     * Undocumented variable
     *
     * @var string
     */
    protected $model = Comment::class;

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
        return $user->can("{$operation} comments");
    }
}
