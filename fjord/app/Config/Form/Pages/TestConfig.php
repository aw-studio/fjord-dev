<?php

namespace FjordApp\Config\Form\Pages;

use App\Models\Employee;
use Fjord\Crud\CrudForm;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Pages\TestController;

class TestConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TestController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'test';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(function ($form) {

            /*
            $form->code('code')
                ->title('Google Analytics Id')
                ->lineNumbers(true)
                ->hint('Insert your google analytics script.')
                ->cols(6);

            return;
            */

            $form->manyRelation('employee')
                ->relatedCols(12)
                ->title('Employee')
                ->model(Employee::class)
                ->sortable(true)
                ->perPage(5)
                ->form(function ($form) {
                    $form->input('first_name')
                        ->title('Vorname')
                        ->cols(6);

                    $form->input('last_name')
                        ->title('Nachname')
                        ->cols(6);
                })
                ->preview(function ($table) {
                    $table->col('ID')->value('id')->small();
                    $table->col('Firstname')->value('first_name');
                    $table->col('E-mail')->value('{email}');
                });

            /*
                ->form(function ($form) {
                    //$form->input('first_name')->title("Vorname")->cols(6);
                    $form->input('last_name')->title("Nachname")->cols(6);
                });
                */


            return;
            $form->input('test')
                ->cols(6)
                ->title('asdas');
            $form->wysiwyg('text')
                ->title('Text')
                ->cols(6);

            $form->component('test');

            return;
            $form->oneRelation('employee')
                ->title('Employee')
                ->model(Employee::class)
                ->preview(function ($table) {
                    $table->col('first_name');
                });

            $form->manyRelation('employees')
                ->title('Employees')
                ->model(Employee::class)
                ->preview(function ($table) {
                    $table->col('first_name');
                });
            return;
            $form->input('input')
                ->title('Input')
                ->placeholder('Title')
                ->hint('Basic input.')
                ->translatable()
                ->cols(6);

            $form->textarea('textarea')
                ->translatable()
                ->title('Textarea')
                ->placeholder('Type something...')
                ->hint('Basic textarea.')
                ->cols(6);

            $form->code('code')
                ->title('Google Analytics Id')
                ->hint('insert your google analytics tag.')
                ->cols(6);

            $form->wysiwyg('wysiwyg')
                ->translatable()
                ->title('WYSIWYG')
                ->placeholder('Type something...')
                ->hint('WYSIWYG editor.')
                ->cols(6);

            $form->boolean('active')
                ->title('Live')
                ->hint('Put the site online.')
                ->cols(3);

            $form->checkboxes('fruits')
                ->title('Fruits')
                ->options([
                    'orange' => 'Orange',
                    'apple' => 'Apple',
                    'pineapple' => 'Pineapple',
                    'grape' => 'Grape',
                ])
                ->hint('Select your fruits.')
                ->cols(6);

            $form->range('range')
                ->title('Range')
                ->min(1)
                ->max(4)
                ->step(1)
                ->hint('Range.')
                ->cols(6);

            $form->select('article_type')
                ->title('Type')
                ->options([
                    1 => 'News',
                    2 => 'Info',
                ])
                ->hint('Select the article type.');

            $form->icon('icon')
                ->title('Icon')
                ->hint('Choose your icon.')
                ->cols(2);

            $form->datetime('publish_at')
                ->title('Date')
                ->formatted('l')
                ->hint('Chose a date.')
                ->cols(6);
        });
    }
}
