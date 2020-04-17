<?php

namespace App\Fjord\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use App\Fjord\Controllers\Form\Pages\FaqController;

class FaqConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    protected $controller = FaqController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    protected $formName = 'faq';

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
