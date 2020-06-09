<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\WysiwygController;

class WysiwygConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = WysiwygController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/wysiwyg";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'wysiwyg',
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
            $form->wysiwyg('text')
                ->translatable()
                ->title('Description')
                ->hint('The Description for some Object.');
        });
    }
}
