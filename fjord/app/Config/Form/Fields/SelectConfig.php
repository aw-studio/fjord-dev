<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\SelectController;

class SelectConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = SelectController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/select";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'select',
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
            $form->select('article_type')
                ->title('Type')
                ->options([
                    1 => 'News',
                    2 => 'Info',
                ])
                ->hint('Select the article type.');
        });
    }
}
