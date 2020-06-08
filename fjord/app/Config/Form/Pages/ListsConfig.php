<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\ListsController;

class ListsConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ListsController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'lists';

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Listen',
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

            $form->list('text')
                ->title('Main Navigation');
        });
    }
}
