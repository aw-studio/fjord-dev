<?php

namespace FjordApp\Config\Crud;

use App\Models\Employee;
use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Support\Facades\Fjord;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use Illuminate\Database\Eloquent\Builder;
use FjordApp\Controllers\Crud\EmployeeController;

class EmployeeConfig extends CrudConfig
{
    /**
     * Is index table sortable.
     *
     * @var boolean
     */
    public $sortable = true;

    /**
     * Order column for model.
     *
     * @var string
     */
    public $orderColumn = 'order_column';

    public $expandIndexContainer = true;

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
    public $sortByDefault = 'order_column.desc';

    /**
     * Preview route.
     *
     * @param Employee $employee
     * @return string
     */
    public function previewRoute(Employee $employee)
    {
        return route('home');
    }

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
            'email.desc' => 'Email absteigend',
            'email.asc' => 'Email aufsteigend',
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
        $query->with('department')
            ->with('projects')
            ->withCount('projects');

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
     * Index component.
     *
     * @param string $component
     * @return void
     */
    public function indexComponent($component)
    {
        $component->slot('indexControls', 'fj-test');
        //$component->slot('navControls', 'fj-test');
    }

    /**
     * Setup index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->col('Id')
            ->value('{id}')
            ->sortBy('id')
            ->small();

        $table->component('fj-col-image')
            ->src('{image.conversion_urls.sm}')
            ->maxWidth('50px')
            ->label('Image')
            ->small();

        $table->col('Lastname')
            ->value('{last_name}')
            ->sortBy('last_name');

        $table->col('Firstname')
            ->value('{first_name}')
            ->link('crud/employees/{id}/edit#email')
            ->sortBy('first_name');

        $table->col('E-Mail')
            ->value('{email}')
            ->sortBy('email');


        $table->component('fj-col-crud-relation')
            ->bind([
                'related' => 'department',
                'value' => 'name',
                'routePrefix' => Fjord::config('crud.department')->route_prefix
            ])
            ->label('Department')
            ->sortBy('department.name');

        $table->component('employee-projects')
            ->label('Projects')
            ->sortBy('projects_count')
            ->link('crud/employees/{id}/edit#projects')
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
        $form->card(function ($form) {

            $form->group(function ($col) {
                $col->input('first_name')
                    ->title('Firstname')
                    ->rules('max:50')
                    ->creationRules('required')
                    ->width(12);

                $col->input('last_name')
                    ->title('Lastname')
                    ->rules('max:60')
                    ->creationRules('required')
                    ->width(12);
            })->width(7);

            $form->image('images') // images is the corresponding media collection.
                ->translatable()
                ->title('Images')
                ->firstBig()
                ->hint('Image Collection.')
                ->maxFiles(5);



            $form->input('email')
                ->rules('max:60')
                ->title('E-mail')
                ->creationRules('required')
                ->width(6);
        })->width(12)->title('Main');
    }
}
