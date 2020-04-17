<?php

namespace App\Fjord\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use App\Fjord\Controllers\Crud\ProjectController;

class ProjectConfig extends CrudConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    protected $controller = ProjectController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    protected $search = ['title', 'manager.last_name'];

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
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->col('Title')
            ->value('{title}')
            ->sortBy('title');

        $table->component('project-status')
            ->label('Status')
            ->sortBy('title')
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
            'singular' => ucfirst(__f('models.project')),
            'plural' => ucfirst(__f('models.projects')),
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function form(CrudForm $form)
    {
        $form->card(
            $this->mainForm($form),
        )->cols(12);

        $form->card()->cols(12);
    }


    private function mainForm(CrudForm $form)
    {
        $form->input('title')
            ->max(60)
            ->title('Title')
            ->placeholder('Title')
            ->hint('The project\'s title')
            ->cols(8);

        $form->select('employee_id')
            ->title('Employee')
            ->options(\App\Models\Employee::projectManagement()->get()->mapWithKeys(function ($item, $key) {
                return [$item->id => $item->fullName];
            })->toArray())
            ->hint('Select a Projectmanager')
            ->cols(4);

        $form->wysiwyg('description')
            ->title('Description')
            ->hint('The project\'s description')
            ->cols(12);
    }
}
