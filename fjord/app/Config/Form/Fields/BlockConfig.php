<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\BlockController;

class BlockConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = BlockController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/block";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'block',
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
            $form->blocks('content')
                ->title('Content')
                ->repeatables(function ($repeatables) {

                    // Add as many repeatables as you want.
                    $repeatables->add('text', function ($form, $preview) {
                        // The block preview.
                        $preview->col('{text}');

                        // Containing as many form fields as you want.
                        $form->input('text')
                            ->title('Text');
                    });

                    $repeatables->add('image', function ($form, $preview) {
                        $preview->col('{}');

                        $form->image('image')
                            ->title('Image');
                    });
                });
        });
    }
}
