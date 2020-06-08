<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;

use App\Models\Test;
use FjordApp\Controllers\Crud\TestController;

class TestConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Test::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TestController::class;

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f('models.tests')),
            'plural' => ucfirst(__f('models.tests')),
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "crud/" . (new $this->model)->getTable();
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Crud\CrudIndex $container
     * @return void
     */
    public function index(CrudIndex $container)
    {
        $container->expand(false);

        $container->table(function ($table) {
            $table->col('title')
                ->value('{title}')
                ->sortBy('title');
        })
            ->sortByDefault('id.desc')
            ->search('name')
            ->sortBy([
                'id.desc' => __f('fj.sort_new_to_old'),
                'id.asc' => __f('fj.sort_old_to_new'),
            ])
            ->width(12);
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

            $form->input('title')
                ->title('Title')
                ->width(6);
        })
            ->width(12)
            ->title('Main');
    }
}
