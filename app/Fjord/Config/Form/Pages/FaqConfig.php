<?php

namespace App\Fjord\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\Config\Traits\HasCrudForm;
use App\Fjord\Controllers\Form\Pages\FaqController;

class FaqConfig extends FormConfig
{
    use HasCrudForm;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FaqController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'faq';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        //
    }
}
