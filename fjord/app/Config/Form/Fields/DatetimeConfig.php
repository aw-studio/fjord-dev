<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\DatetimeController;

class DatetimeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DatetimeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/datetime";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'datetime',
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
            $form->datetime('publish_at')
                ->title('Date')
                ->formatted('l')
                ->hint('Chose a date.')
                ->width(6);
        });
    }
}
