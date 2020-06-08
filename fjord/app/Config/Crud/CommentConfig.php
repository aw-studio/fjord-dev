<?php

namespace FjordApp\Config\Crud;

use App\Models\Comment;
use App\Models\Employee;
use Fjord\Crud\CrudShow;
use App\Models\Department;
use Fjord\Crud\CrudIndex;
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
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function ($form) {
            $this->mainForm($form);
        })->width(12)->title('Main');
    }


    protected function mainForm(CrudShow $form)
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
