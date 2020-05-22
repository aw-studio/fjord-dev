<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\Config\Traits\HasCrudForm;
use FjordApp\Controllers\Form\Pages\FaqController;

class FaqConfig extends FormConfig
{
    use HasCrudForm;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FaqController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'faq';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function ($form) {

            $form->input('title')
                ->title('Title');

            $form->markdown(\Illuminate\Support\Facades\File::get(fjord_path('docs/docs/examples/form-loader-example.md')));
        });
    }
}
