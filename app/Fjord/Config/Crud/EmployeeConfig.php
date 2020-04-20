<?php

namespace App\Fjord\Config\Crud;

use App\Models\Employee;
use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use App\Fjord\Controllers\Crud\EmployeeController;

class EmployeeConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Employee::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = EmployeeController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['last_name', 'first_name'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    /**
     * Sort by keys.
     *
     * @return array
     */
    public function sortBy()
    {
        return [
            'id.desc' => __f('fj.sort_new_to_old'),
            'id.asc' => __f('fj.sort_old_to_new'),
        ];
    }

    /**
     * Initialize index query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function indexQuery(Builder $query)
    {
        $query->with('department');
        $query->with('projects');
        $query->withCount('projects');

        return $query;
    }

    /**
     * Index table filter groups.
     *
     * @return array $groups
     */
    public function filter()
    {
        return [
            'Department' => [
                'development' => 'Development',
                'marketing' => 'Marketing',
                'projectManagement' => 'Project-Management',
                'sales' => 'Sales',
                'humanResources' => 'Human-Resources'
            ],
        ];
    }

    /**
     * Setup index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->component('fj-col-image')
            ->src('{image.conversion_urls.sm}')
            ->maxWidth('50px')
            ->label('Status')
            ->sortBy('title')
            ->small();

        $table->col('Lastname')
            ->value('{last_name}')
            ->sortBy('last_name');

        $table->col('Firstname')
            ->value('{first_name}')
            ->link('crud/employees/{id}/edit#email')
            ->sortBy('first_name');

        $table->component('fj-col-crud-relation')
            ->props([
                'relation' => 'department',
                'value' => 'name',
                'link' => 'departments'
            ])
            // TODO: Make link work for component.
            //->link(false)
            ->label('Department')
            ->sortBy('department.name')
            ->small();

        $table->component('employee-projects')
            ->label('Projects')
            ->sortBy('projects_count')
            //->link('crud/employees/{id}/edit#projects')
            ->small();
    }

    /**
     * Model singular and plural name.
     *
     * @return array $names
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f('models.employee')),
            'plural' => ucfirst(__f('models.employees')),
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(
            $this->mainForm($form),
        )->cols(12)->title('Main');
    }


    protected function mainForm(CrudForm $form)
    {
        $form->relation('department')
            ->title('Department')
            ->preview(function ($table) {
                $table->col('name');
            });

        $form->relation('projects')
            ->title('Works on')
            ->preview(function ($table) {
                $table->col('{title}');
            });

        $form->relation('comments_morph_one')
            ->title('Comments morphOne')
            ->preview(function ($table) {
                $table->col('body');
            });
    }
}
