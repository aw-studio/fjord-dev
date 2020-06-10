<?php

namespace FjordApp\Config\Form\Relations;

use App\Models\Employee;
use Fjord\Crud\CrudShow;
use App\Models\Department;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Config\Crud\StargazerConfig;
use FjordApp\Config\Crud\DepartmentConfig;
use FjordApp\Controllers\Form\Relations\OneRelationController;

class OneRelationConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = OneRelationController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "relations/one-relation";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'OneRelation',
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
            $form->info('Relation');

            $form->oneRelation('department')
                ->title('Department')
                ->type('table')
                ->routePrefix('department')
                ->preview(function ($table) {
                    $table->col('name')->value('{name}');
                })
                ->model(Department::class);
        });

        $form->card(function ($form) {
            $form->info('Relation link with custom names.');

            $form->oneRelation('names_department')
                ->title('Department')
                ->type('link')
                ->linkValue('{name}')
                ->preview(function ($table) {
                    $table->col('name')->value('{name}');
                })
                ->use(DepartmentConfig::class)
                ->names([
                    'singular' => 'DEPARTMENT',
                    'plural' => 'DEPARTMENTS',
                ]);
        });

        $form->card(function ($form) {
            $form->info('Relation with existing model config.');

            /*
            $form->oneRelation('employees')
                ->title('Employee')
                ->model(Employee::class)
                ;
                */
        });

        $form->card(function ($form) {
            $form->info('Relation with existing model config.');

            $form->oneRelation('stargazers')
                ->title('Employee')
                ->use(StargazerConfig::class);
        });
    }
}
