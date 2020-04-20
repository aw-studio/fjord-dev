<?php

namespace App\Fjord\Controllers\Form\Pages;

use Fjord\Fjord\Models\FjordUser;
use Fjord\Crud\Controllers\FormController;

class FaqController extends FormController
{
    /**
     * Form config class.
     *
     * @var string
     */
    protected $config = \App\Fjord\Config\Form\Pages\FaqConfig::class;

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
        return $user->can("{$operation} pages");
    }
}
