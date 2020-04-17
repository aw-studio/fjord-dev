<?php

namespace App\Fjord\Config\Form\Pages;

use Fjord\Crud\CrudForm;
use App\Models\Department;
use Fjord\Vue\RelationTable;
use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use App\Fjord\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    protected $controller = HomeController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    protected $formName = 'home';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function form(CrudForm $form)
    {
        /*
        $form->card(function ($form) {
            $form->input('title')
                ->title('Input')
                ->translatable(true)
                ->cols(6);

            $form->boolean('active')
                ->title('Boolean')
                ->cols(3);

            $form->icon('icon')
                ->title('Icon')
                ->cols(3);

            $form->dt('time')
                ->title('Datetime')
                ->cols(6);

            $form->code('code')
                ->title('Code')
                ->language('text/javascript')
                ->theme('mbo')
                ->cols(6);

            $form->checkboxes('checkboxes')
                ->title('Checkboxes')
                ->options(['a', 'b'])
                ->hint('Checkboxes...')
                ->cols(3);

            $form->range('range')
                ->title('Range')
                ->min(0)
                ->max(10)
                ->hint('range...')
                ->cols(7);

            $form->textarea('textarea')
                ->title('Textarea')
                ->translatable(true)
                ->cols(6);

            $form->wysiwyg('wysiwyg')
                ->title('Wysiwyg')
                ->translatable(true)
                ->cols(6);
        })->cols(6)->title('Main');
        */

        /*
        $form->card(function ($form) {
            $this->cardBlocks($form);
        })->cols(6)->title('Blocks');
        */

        $form->card(function ($form) {

            $form->oneRelation('one')
                ->title('One Relation')
                ->model(Department::class)
                ->preview(function (RelationTable $table) {
                    $table->component('fj-col-image')
                        ->src('https://miro.medium.com/max/1400/1*mk1-6aYaf_Bes1E3Imhc0A.jpeg');
                    $table->col('name');
                });
        })->cols(6)->title('Relation');

        //dd($form->toArray());
    }

    private function cardBlocks($form)
    {
        $form->blocks('block')
            ->title('Blocks')
            ->repeatables(function ($rep) {
                $this->getRepeatables($rep);
            });
    }

    private function getRepeatables(Repeatables $rep)
    {
        $rep->add('text', function ($form) {
            $form->input('input')
                ->title('Block input')
                ->cols(6);
        });
    }
}
