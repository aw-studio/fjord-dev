<?php

namespace App\Http\Controllers\Fjord\Crud;

use App\Models\Comment;
use Fjord\Fjord\Models\FjordUser;
use Fjord\Form\Controllers\CrudController;

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
