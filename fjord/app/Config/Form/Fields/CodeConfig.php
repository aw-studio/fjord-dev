<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\CodeController;

class CodeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CodeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/code";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'code',
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
            $form->code('code')
                ->title('Code')
                ->hint('Default language is html.');

            $form->code('js_code')
                ->title('Code')
                ->language('text/javascript')
                ->hint('Javascript language.');
        });
    }
}
