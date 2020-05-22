<?php

namespace FjordApp\Config\Form\Pages;

use App\Models\Article;
use App\Models\Employee;
use Fjord\Crud\CrudForm;
use Fjord\Support\Facades\Crud;
use Fjord\Crud\Config\FormConfig;
use Illuminate\Support\Facades\File;
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

            $form->select('dummy')
                ->storable(false)
                ->title('Choose')
                ->options([
                    'post' => 'Post',
                    'video' => 'Video',
                ]);



            $form->manyRelation('post')
                ->model(Article::class)
                ->dependsOn('dummy', 'post')
                ->preview(function ($preview) {
                    $preview->col('Title')->value('{title}');
                })
                ->title('Post')
                ->cols(12);

            $form->manyRelation('video')
                ->model(Article::class)
                ->dependsOn('dummy', 'video')
                ->preview(function ($preview) {
                    $preview->col('Title')->value('{title}');
                })
                ->title('Video')
                ->cols(12);

            return;

            $form->info('Adress')
                ->cols(4)
                ->text('This address appears on your <a href="' . route('invoices') . '">invoices</a>.');

            $form->col(6, function ($form) {
                $form->input('text')
                    ->title('Text')
                    ->max(50)
                    ->rules('required', 'min:10', 'max:50')
                    ->cols(12);

                $form->password('password')
                    ->title('Password')
                    ->rules('min:50')
                    ->cols(12);
            });



            $form->image('images')
                ->title('Images')
                ->maxFiles(10)
                ->crop(10 / 2)
                ->firstBig()
                ->hint('The first image is the preview image.')
                ->cols(6);

            $form->modal('change_password')
                ->name('Passwort ändern')
                ->title('Passwort')
                ->size('md')
                ->confirmWithPassword()
                ->form(function ($form) {
                    $form->input('test')->title('Hallo')->rules('required');
                });

            $form->dt('to')
                ->formatted('l')
                ->title('bis')
                ->hint('bis')
                ->cols(6);

            $form->wysiwyg('test')
                ->title('Test')
                ->rules('min:100')
                ->cols(12);
        })->cols(12)->class('mb-5');

        $form->card(function ($form) {
            $form->icon('icon')
                ->title('Icon')
                ->search()
                ->hint('Choose your icon.')
                ->cols(2);

            $form->range('range')
                ->title('Range')
                ->min(0)
                ->max(10)
                ->cols(12);
        })->cols(12);

        $form->card(function ($form) {

            $form->image('image')
                ->title('Image')
                ->crop(16 / 9)
                ->maxFiles(10)
                ->crop(10 / 2)
                ->firstBig()
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
            $preview->col('Fruit')
                ->value('orange')
                ->regex('/\b(\w*orange\w*)\b/im', 'apple');


            $preview->col('{text}')
                ->stripHtml()
                ->maxChars(50);

            $form->wysiwyg('text')
                ->title('Text')
                ->cols(6);

            $form->input('input')
                ->title('Titel')
                ->cols(6);
            $preview->col('{input}');
        });

        $rep->add('image', function ($form, $preview) {
            $preview->image()
                ->src('{first_image.conversion_urls.sm}')
                ->square('50px');

            $form->image('image')
                ->title('Image')
                ->cols(12);
        });

        $rep->add('relation', function ($form, $preview) {

            $preview->relation()
                ->related('first_employees')
                ->value('{first_name} {last_name}')
                ->routePrefix(Crud::config(Employee::class)->route_prefix);

            $form->manyRelation('employees')
                ->model(Employee::class)
                ->searchable()
                ->previewQuery(function ($query) {
                    //$query
                })
                ->preview(function ($preview) {
                    $preview->col('Name')->value('{first_name} {last_name}');
                })
                ->form(function ($form) {
                    $form->input('first_name')
                        ->title('Vorname')
                        ->cols(6);

                    $form->input('last_name')
                        ->title('Nachname')
                        ->cols(6);
                })
                ->title('Relation')
                ->cols(12);
        });
    }
}
