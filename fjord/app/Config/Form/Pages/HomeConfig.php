<?php

namespace FjordApp\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use App\Models\Department;
use Fjord\Crud\Config\FormConfig;
use Fjord\Vue\Crud\RelationTable;
use Fjord\Crud\Config\Traits\HasCrudForm;
use Fjord\Crud\Fields\Blocks\Repeatables;
use FjordApp\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    use HasCrudForm;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'home';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function ($form) {

            $form->input('headline')
                ->title('Headline')
                ->translatable()
                ->cols(12);
        })->cols(12)->class('mb-5');

        $form->card(function ($form) {
            $form->icon('icon')
                ->title('Icon')
                ->search()
                ->hint('Choose your icon.')
                ->cols(2);
        })->cols(12);

        $form->card(function ($form) {
            $form->image('image')
                ->title('Image')
                ->maxFiles(10)
                //->firstBig()
                ->hint('The first image is the preview image.')
                ->cols(12);
        })->cols(12)->class('mb-2');

        $form->card(function ($form) {
            $this->blocks($form);
        });
    }

    /**
     * Setup form blocks.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function blocks(CrudForm $form)
    {
        $form->blocks('block')
            ->title('Blocks')
            ->repeatables(function ($rep) {
                $this->repeatables($rep);
            });
    }

    /**
     * Create repeatables.
     *
     * @param Repeatables $rep
     * @return void
     */
    protected function repeatables(Repeatables $rep)
    {
        $rep->add('text', function ($form, $preview) {
            $preview->col('input');

            $form->input('input')
                ->title('Titel')
                ->cols(6);
        });

        $rep->add('image', function ($form, $preview) {
            $preview->col('Bild');

            $form->image('image')
                ->title('Image')
                ->cols(12);
        });
    }
}
