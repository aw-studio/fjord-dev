<?php

namespace App\Fjord\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use App\Fjord\Controllers\Crud\DepartmentController;

class DepartmentConfig extends CrudConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    protected $controller = DepartmentController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    protected $search = ['title', 'text'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    protected $sortByDefault = 'id.desc';

    /**
     * Initialize index query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function indexQuery(Builder $query)
    {
        return $query;
    }

    /**
     * Setup index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
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
            'singular' => ucfirst(__f('models.project')),
            'plural' => ucfirst(__f('models.projects')),
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\Crud\CrudTable $form
     * @return void
     */
    protected function form(CrudForm $form)
    {
        $form->card(
            $this->mainForm($form)
        )->title('Main Form');
    }

    /**
     * Main card fields.
     *
     * @param \Fjord\Crud\Crud\CrudTable $form
     * @return void
     */
    private function mainForm(CrudForm $form)
    {
        $form->input('name')
            ->max(60)
            ->title('Title')
            ->placeholder('Title')
            ->hint('The project\'s title')
            ->width(8);
    }
}
