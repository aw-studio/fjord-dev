<?php


namespace App\Fjord\Controllers\Crud;

use App\Models\ProjectStatus;
use Fjord\Fjord\Models\FjordUser;
use Fjord\Crud\Controllers\CrudController;

class ProjectStatusController extends CrudController
{
    protected $model = ProjectStatus::class;

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
        return $user->can("{$operation} projects");
    }
}
