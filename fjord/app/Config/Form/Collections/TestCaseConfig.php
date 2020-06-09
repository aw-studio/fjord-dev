<?php

namespace FjordApp\Config\Form\Collections;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Collections\TestCaseController;

class TestCaseConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TestCaseController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "collections/test-case";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'test_case',
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function ($form) {

            $form->input('text')
                ->title('text');

            // ...
        });
    }
}
