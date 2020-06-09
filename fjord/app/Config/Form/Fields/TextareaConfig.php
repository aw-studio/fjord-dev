<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\TextareaController;

class TextareaConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TextareaController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/textarea";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'textarea',
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

            $form->textarea('text')
                ->translatable()
                ->title('Description')
                ->placeholder('Type something...')
                ->hint('Default rows 3, maxRows 5.');


            $form->textarea('text')
                ->translatable()
                ->maxRows(10)
                ->title('Description')
                ->placeholder('Type something...')
                ->hint('maxRows 10.');

            $form->textarea('text')
                ->translatable()
                ->rows(2)
                ->maxRows(2)
                ->title('Description')
                ->placeholder('Type something...')
                ->hint('rows 2, maxRows 2.');
        });
    }
}
