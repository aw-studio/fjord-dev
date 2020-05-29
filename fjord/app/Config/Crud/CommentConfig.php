<?php

namespace FjordApp\Config\Crud;

use App\Models\Comment;
use App\Models\Employee;
use Fjord\Crud\CrudForm;
use App\Models\Department;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use FjordApp\Controllers\Crud\CommentController;

class CommentConfig extends CrudConfig
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

    /**
     * Setup index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {

        $table->col('Text')
            ->value('body')
            ->sortBy('body');
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
            $this->mainForm($form);
        })->width(12)->title('Main');
    }


    protected function mainForm(CrudForm $form)
    {
        $form->relation('commentable')
            ->title('Comments morphTo')
            ->small()
            ->morphTypes(function ($morph) {
                $morph->to(Employee::class, function ($preview) {
                    $preview->col('Name')->value('{first_name} {last_name}');
                });
                $morph->to(Department::class, function ($preview) {
                    $preview->col('Name')->value('{name}');
                });
            });
    }
}
