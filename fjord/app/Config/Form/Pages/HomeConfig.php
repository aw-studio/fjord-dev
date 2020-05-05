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
        $form->info('Firmenadresse')
            ->cols(4)
            ->text('Neuer abstazu')
            ->text('Diese Adresse erscheint auf Ihren Rechnungen. In Ihren Versandeinstellungen können Sie die Adresse bearbeiten, die für die Berechnung der Versandtarife verwendet wird.')
            ->text('Ihr Hauptgeschäftsstandort kann beeinflussen, welche Apps in Ihrem Shop verwendet werden können. <a href="#">Weitere Informationen über die Kompatibilität von Apps</a>');

        $form->card(function ($form) {

            /*
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

            $form->info('FORMAT DER BESTELLNUMMER BEARBEITEN (OPTIONAL)')
                ->cols(12)
                ->text('Bestellnummern beginnen standardmäßig bei #1001. Sie können die Bestellnummer selbst nicht ändern. Sie können jedoch ein Präfix oder Suffix hinzufügen, um IDs wie "EN1001" oder "1001-A" zu erstellen.');
                */
            $form->input('prefix')
                ->title('Prafix')
                ->prepend('#')
                ->cols(6);

            $form->input('suffix')
                ->translatable()
                ->title('Suffix')
                ->cols(6);
            return;

            $form->select('select')
                ->title('Select')
                ->options([
                    'f' => 'Frau',
                    'm' => 'Mann',
                ])
                ->cols(6);
        })->cols(8)->class('mb-2');

        $form->line()->prop('class', 'mb-2');

        $form->card(function ($form) {
            $form->image('image')
                ->title('Image')
                ->cols(6);
        })->cols(12)->class('mb-2');

        $form->line()->prop('class', 'mb-2');

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
        $rep->add('text', function ($form) {
            $form->input('input')
                ->title('Titel')
                ->cols(6);
        });

        $rep->add('image', function ($form) {
            $form->image('image')
                ->title('Image')
                ->cols(6);
        });
    }
}
