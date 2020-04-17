<?php

namespace App\Fjord\Config\Form\Collections;

use App\Fjord\Controllers\Form\Collections\SettingsController;
use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;

class SettingsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    protected $controller = SettingsController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    protected $formName = 'settings';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function form(CrudForm $form)
    {
        //
    }
}
