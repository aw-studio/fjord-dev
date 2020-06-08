<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudShow;
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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function ($form) {

            $form->input('text')
                ->translatable()
                ->rules('required', 'min:5', 'max:25')
                ->title('Title')
                ->width(4);

            $form->wysiwyg('asdfsd')
                ->title('text');

            $form->textarea('sdfs')
                ->title('text');

            // ...
        });
    }
}
