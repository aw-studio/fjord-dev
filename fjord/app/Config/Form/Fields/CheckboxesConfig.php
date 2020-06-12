<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\CheckboxesController;

class CheckboxesConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CheckboxesController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/checkboxes";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'checkboxes',
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
            $form->checkboxes('fruits')
                ->title('Fruits')
                ->options([
                    'orange' => __f('fruits.orange'),
                    'apple' => __f('fruits.apple'),
                    'pineapple' => __f('fruits.pineapple'),
                    'grape' => __f('fruits.grape'),
                    'dragonfruit' => __f('fruits.dragonfruit')
                ])
                ->hint('Smash your fruits.')
                ->width(12);
        });
    }
}
