<?php

namespace FjordApp\Config\Relations;

use App\Models\Comment;
use App\Models\Employee;
use Fjord\Crud\CrudShow;
use App\Models\Department;
use Fjord\Crud\CrudIndex;
use Fjord\Crud\Config\CrudConfig;
use FjordApp\Controllers\Crud\CommentController;

class MorphToConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Comment::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = CommentController::class;

    public function routePrefix()
    {
        return 'relations/morhp-to';
    }

    /**
     * Model singular and plural name.
     *
     * @return array $names
     */
    public function names()
    {
        return [
            'singular' => 'morphTo',
            'plural' => 'morphTo',
        ];
    }

    /**
     * Setup index table.
     *
     * @param \Fjord\Vue\Crud\CrudIndex $table
     * @return void
     */
    public function index(CrudIndex $container)
    {
        $container->table(function ($table) {
            $table->col('Text')
                ->value('body')
                ->sortBy('body');
        });
    }

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(fn ($form) => $this->mainForm($form))
            ->width(12)
            ->title('Main');
    }

    /**
     * Main form.
     *
     * @param CrudShow $form
     * @return void
     */
    protected function mainForm(CrudShow $form)
    {
        $form->input('body')->title('Body');
        $form->relation('commentable')
            ->title('Comments morphTo')
            ->morphTypes(function ($morph) {
                $morph->to(Employee::class)
                    ->title('Employee')
                    ->preview(fn ($table) => $table->col('Name')->value('{name}'));

                $morph->to(Department::class)
                    ->title('Department')
                    ->preview(fn ($table) => $table->col('Name')->value('{name}'));
            });
    }
}
