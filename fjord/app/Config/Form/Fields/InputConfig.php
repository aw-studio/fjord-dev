<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\InputController;

class InputConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = InputController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/input";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Input',
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
            $form->input('title')
                ->title('Title')
                ->hint('The Title is shown at the top of the page.')
                ->width(1 / 2);

            $form->input('length')
                ->title('Length')
                ->type('number')
                ->placeholder('The length in cm')
                ->hint('Enter the length in cm.')
                ->append('cm')
                ->width(1 / 2);
        });
    }
}
