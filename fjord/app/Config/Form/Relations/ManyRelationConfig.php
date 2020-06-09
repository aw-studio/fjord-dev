<?php

namespace FjordApp\Config\Form\Relations;

use Fjord\Crud\CrudShow;
use App\Models\Department;
use Fjord\Crud\Config\FormConfig;
use FjordApp\Controllers\Form\Relations\ManyRelationController;

class ManyRelationConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = ManyRelationController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "relations/many-relation";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'ManyRelation',
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
            $form->manyRelation('department')
                ->title('Department')
                ->model(Department::class);
        });
    }
}
