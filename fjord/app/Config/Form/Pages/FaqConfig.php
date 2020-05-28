<?php

namespace FjordApp\Config\Form\Pages;

use App\Models\Article;
use Fjord\Crud\CrudForm;
use App\Models\Department;
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
            $form->select('test_select')
                ->title('Test select')
                ->options([
                    'a' => 'A',
                    'b' => 'B',
                ]);

            $form->group(function ($form) {
                $form->input('title')
                    ->title('Title');
                $form->input('title')
                    ->title('Title');
            })->dependsOn('test_select', 'a');


            /*
                ->preview(function ($preview) {
                    $preview->col('Name')->value('{name}');
                });
                */
        })->width(1 / 2);

        /*
        $form->card(function ($form) {
            
            $form->input('title')
                ->title('Title');

            $form->markdown(\Illuminate\Support\Facades\File::get(fjord_path('docs/docs/examples/form-loader-example.md')));
            
        });
        */
    }
}
