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
        // $container->chart('charts.sales_count_total_chart')->width(1 / 3)->height('190px');

        // Bar
        $container->chart('charts.sales_count_column_chart')->width(4)->height('300px');
        $container->chart('charts.sales_count_column_chart')->width(4)->height('300px')->variant('white');
        $container->chart('charts.sales_count_column_chart')->width(4)->height('300px')->variant('secondary');

        // Progress
        $container->chart('charts.sales_progress_chart')->width(1 / 3)->height('190px');

        // $container->chart('charts.sales_chart_count')->width(1 / 3)->height('190px');
        // $container->chart('charts.sales_chart_avg')->width(1 / 3)->height('250px');
        // $container->chart('charts.sales_chart_max')->width(1 / 3)->height('250px');

        // $container->chart('charts.sales_product_chart')->width(1 / 3)->height('190px')->variant('primary');
        // $container->chart('charts.sales_product_chart')->width(1 / 3)->height('250px')->variant('secondary');
        // $container->chart('charts.sales_product_chart')->width(1 / 3)->height('250px')->variant('white');
    }
}
