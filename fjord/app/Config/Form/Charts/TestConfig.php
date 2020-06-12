<?php

namespace FjordApp\Config\Form\Charts;

use Fjord\Crud\CrudShow;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Charts\TestController;

class TestConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TestController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "charts/test";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'test',
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
        $form->component('fj-chart')
            ->bind([
                'title' => 'How much money did we make today?'
            ]);

        $form->component('fj-chart')
            ->bind([
                'title' => 'How much money did we make today?',
                'variant' => 'primary'
            ]);

        $form->component('fj-chart')
            ->bind([
                'title' => 'How much money did we make today?',
                'variant' => 'secondary'
            ]);
    }
}
