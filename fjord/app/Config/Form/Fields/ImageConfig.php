<?php

namespace FjordApp\Config\Form\Fields;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Fields\ImageController;

class ImageConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ImageController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "fields/image";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'image',
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
            $form->image('images')
                ->translatable()
                ->title('Translatable Images and crop.')
                ->hint('Translatable and crop.')
                ->maxFiles(5);

            $form->image('first_big_images')
                ->title('FirstBig Images')
                ->firstBig()
                ->hint('firstBig.')
                ->maxFiles(5);

            $form->image('expand_image')
                ->title('Expand Image')
                ->hint('expand.')
                ->expand()
                ->maxFiles(1);
        });
    }
}
