<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\TestController;

class TestConfig extends FormConfig
{

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TestController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'test';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Testsss',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function ($form) {

            $form->input('text')
                ->title('text');

            // ...
        });
    }
}
