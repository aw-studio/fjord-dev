<?php

namespace App\Fjord\Config\Crud;

use Fjord\Crud\Form;
use Fjord\Vue\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Fjord\Crud\ProjectController;

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
     * @param \Fjord\Vue\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->col('Title')
            ->value('{title}')
            ->sortBy('title');

        $table->component('project-status')
            ->label('Status')
            ->sortBy('title');
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
     * @param \Fjord\Crud\Form $form
     * @return void
     */
    protected function form(Form $form)
    {
        $form->card(
            $this->mainForm($form)
        );
    }

    private function mainForm(Form $form)
    {
        $form->input('title')
            ->max(60)
            ->title('Title')
            ->placeholder('Title')
            ->hint('The project\'s title')
            ->width(8);
    }
}
