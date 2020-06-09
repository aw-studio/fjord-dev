<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use App\Models\Department;
use Fjord\Crud\Config\CrudConfig;
use FjordApp\Controllers\Crud\DepartmentController;

class DepartmentConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Department::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DepartmentController::class;

    /**
     * Route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'departments';
    }

    /**
     * Crud singular & plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f('models.department')),
            'plural' => ucfirst(__f('models.departments')),
        ];
    }

    /**
     * Setup crud index container.
     *
     * @param CrudIndex $table
     * @return void
     */
    public function index(CrudIndex $container)
    {
        //$container->expand();

        $container->table(function ($table) {
            $table->col('Department sdsdfsdf')
                ->value('{name}')
                ->sortBy('name');
        })
            ->sortByDefault('id.desc')
            ->filter([
                'test' => [
                    'abc' => 'Abc'
                ]
            ])
            ->search('name', 'id')
            ->width(1 / 2);

        $container->component('fj-test-chart')
            ->prop('money', 20)
            ->prop('width', 1 / 4);
    }

    /**
     * Setup create and edit form.
     *
     * @param CrudShow $form
     * @return void
     */
    public function show(CrudShow $container)
    {
        $container->card(function ($form) {
            $form->input('name')->title('Name');
        });
    }
}
