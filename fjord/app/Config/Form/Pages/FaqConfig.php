<?php

namespace FjordApp\Config\Form\Pages;

use App\Models\Article;
use App\Models\Comment;
use Fjord\Crud\CrudShow;
use App\Models\Department;
use App\Models\Employee;
use Fjord\Crud\Config\FormConfig;
use Fjord\Crud\Config\Traits\HasCrudForm;
use FjordApp\Controllers\Form\Pages\FaqController;

class FaqConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FaqController::class;

    /**
     * Form name, is used for routing.
     *
     * @var string
     */
    public $formName = 'faq';

    /**
     * Setup create and edit form.
     *
     * @param \Fjord\Crud\CrudShow $form
     * @return void
     */
    public function show(CrudShow $form)
    {
        $form->card(function ($form) {

            $form->manyRelation('employees')
                ->model(Employee::class)
                ->confirm(false)
                ->perPage(2)
                ->sortable()
                ->title('Employee');
        })->width(12);
    }
}
