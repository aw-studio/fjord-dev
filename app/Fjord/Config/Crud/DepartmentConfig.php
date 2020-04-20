<?php

namespace App\Fjord\Config\Crud;

use App\Models\Employee;
use Fjord\Crud\CrudForm;
use App\Models\Department;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use App\Fjord\Controllers\Crud\DepartmentController;

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
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['title', 'text'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    /**
     * Initialize index query.
     *
     * @param Builder $query
     * @return Builder $query
     */
    public function indexQuery(Builder $query)
    {
        return $query;
    }

    /**
     * Setup index table.
     *
     * @param CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->col('Department Name')
            ->value('{name}')
            ->sortBy('name');

        $table->col('Employees')
            ->value('{employees_count}')
            ->sortBy('employees_count');
    }

    /**
     * Model singular and plural name.
     *
     * @return array $names
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f('models.department')),
            'plural' => ucfirst(__f('models.departments')),
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param CrudTable $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        $form->card(
            $this->mainForm($form)
        )->title('Main Form');

        $form->card(function ($form) {
            $form->relation('employees_belongs_to_many')
                ->title('BelongsToMany')
                ->model(Employee::class)
                ->preview(function ($table) {
                    $table->col('first_name');
                })->sortable(true);
        });
    }

    /**
     * Main card fields.
     *
     * @param CrudTable $form
     * @return void
     */
    protected function mainForm(CrudForm $form)
    {
        $form->input('name')
            ->max(60)
            ->title('Title')
            ->placeholder('Title')
            ->hint('The project\'s title')
            ->cols(8);

        $form->relation('comments_morph_many')
            ->title('Comments morphMany')
            ->preview(function ($table) {
                $table->col('first_name');
            });
    }
}
