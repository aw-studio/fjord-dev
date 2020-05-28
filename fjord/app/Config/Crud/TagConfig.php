<?php

namespace FjordApp\Config\Crud;

use App\Models\Tag;
use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use FjordApp\Controllers\Crud\TagController;

class TagConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Tag::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TagController::class;

    /**
     * Setup index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {

        $table->col('Name')
            ->value('name')
            ->sortBy('name');
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
        )->width(12)->title('Main');
    }


    protected function mainForm(CrudForm $form)
    {

        $form->relation('departments_morphed_by_many')
            ->title('Comments morphedByMany')
            ->preview(function ($table) {
                $table->col('name');
            })
            ->sortable(true)
            ->orderColumn('order');
    }
}
