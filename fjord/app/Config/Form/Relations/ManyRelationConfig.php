<?php

namespace FjordApp\Config\Form\Relations;

use App\Models\Employee;
use Fjord\Crud\CrudShow;
use App\Models\Department;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Config\Crud\StargazerConfig;
use FjordApp\Config\Crud\DepartmentConfig;
use FjordApp\Controllers\Form\Relations\ManyRelationController;

class ManyRelationConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ManyRelationController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "relations/many-relation";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'ManyRelation',
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
        $container->card(function ($form) {
            $form->info('Relation');

            $form->manyRelation('department')
                ->title('Department')
                ->type('table')
                ->routePrefix('department')
                ->preview(function ($table) {
                    $table->col('name')->value('{name}');
                })
                ->model(Department::class);
        });

        $container->card(function ($form) {
            //$form->info('Relation link with custom names.');

            $form->manyRelation('names_department')
                ->title('Tags')
                ->type('tags')
                ->tagValue('{name}')
                ->preview(function ($table) {
                    $table->col('name')->value('{name}');
                })
                ->use(DepartmentConfig::class)
                ->names([
                    'singular' => 'Tag',
                    'plural' => 'Tags',
                ]);
        })->width(6);

        $container->card(function ($form) {
            $form->info('Relation with existing model config.');

            $form->manyRelation('employees')
                ->title('Employee')
                ->model(Employee::class)
                ->preview(function ($table) {
                    $table->col('{first_name}');
                });
        });

        $container->card(function ($form) {
            $form->info('Relation with existing model config.');

            $form->manyRelation('stargazers')
                ->title('stargazers')
                ->use(StargazerConfig::class);
        });
    }
}
