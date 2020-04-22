<?php

namespace FjordApp\Controllers\Form\Collections;

use Fjord\User\Models\FjordUser;
use Fjord\Crud\Controllers\FormController;

class SettingsController extends FormController
{
    /**
     * Authorize request for permission operation and authenticated fjord-user.
     * Operations: read, update
     *
     * @param FjordUser $user
     * @param string $operation
     * @return boolean
     */
    public function authorize(FjordUser $user, string $operation): bool
    {
        return $user->can("{$operation} settings");
    }
}
