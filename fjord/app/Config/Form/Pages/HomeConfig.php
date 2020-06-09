<?php

namespace FjordApp\Config\Form\Pages;

use App\Models\Article;
use App\Models\Employee;
use Fjord\Crud\CrudShow;
use Fjord\Support\Facades\Crud;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function ($form) {
            $form->image('images')
                ->title('Images')
                ->maxFiles(3);

            $form->file('files')
                ->accept(true)
                ->title('Files')
                ->maxFiles(3);
        });
    }
}
