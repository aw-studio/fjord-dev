<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\ListController;

class ListConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ListController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/list";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'List',
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

            $form->list('list')
                ->title('List')
                ->previewTitle('{test_input}')
                ->form(function ($form) {
                    $form->input('test_input')
                        ->title('Titel');

                    $form->wysiwyg('test_text')
                        ->title('Text');

                    $form->icon('icons')
                        ->title('Icon');
                });

            // ...
        });
    }
}
