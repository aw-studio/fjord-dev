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
    public function show(CrudShow $container)
    {
        $container->chart('charts.sales_chart_count')->width(1 / 2);
        $container->chart('charts.sales_chart_avg')->width(1 / 2);
        $container->chart('charts.sales_chart_max')->width(12);

        /*
        $form->component('fj-chart')
            ->title('How much money did we make today?');


        /*
        $form->component('fj-chart')
            ->variant('primary')
            ->title('How much money did we make today?');

        $form->component('fj-chart')
            ->variant('secondary')
            ->title('How much money did we make today?');
            */
    }
}
