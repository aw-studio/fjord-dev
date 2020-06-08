<?php

namespace FjordApp\Config\Crud;

use App\Models\Project;
use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use FjordApp\Controllers\Crud\ProjectController;

class ProjectConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Project::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ProjectController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['title', 'manager.last_name'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    /**
     * Items per page.
     *
     * @var integer
     */
    public $perPage = 10;

    /**
     * Initialize index query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function indexQuery(Builder $query)
    {
        $query->with('manager');
        $query->with('status');
        $query->with('staff.department');

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
            'Status' => [
                "onTrack" => "on track",
                "offTrack" => "off track",
                "onHold" => "on hold",
                "ready" => "ready",
                "blocked" => "blocked",
                "finished" => "finished"
            ]
        ];
    }

    /**
     * Setup index table.
     *
     * @param \Fjord\Crud\CrudIndex $table
     * @return void
     */
    public function index(CrudIndex $container)
    {
        $container->table(function ($table) {
            $table->col('Title')
                ->value('{title}')
                ->sortBy('title');

            $table->component('project-status')
                ->label('Status')
                ->sortBy('title')
                ->small();
        });
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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function ($form) {
            $this->mainForm($form);
        })->width(12);
    }

    private function mainForm(CrudForm $form)
    {
        $form->input('title')
            ->max(60)
            ->title('Title')
            ->placeholder('Title')
            ->hint('The project\'s title')
            ->width(8);

        $form->select('employee_id')
            ->title('Employee')
            ->options(\App\Models\Employee::projectManagement()->get()->mapWithKeys(function ($item, $key) {
                return [$item->id => $item->fullName];
            })->toArray())
            ->hint('Select a Projectmanager')
            ->width(4);

        $form->wysiwyg('description')
            ->title('Description')
            ->hint('The project\'s description')
            ->width(12);
    }
}
