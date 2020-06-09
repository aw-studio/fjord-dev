<?php

namespace FjordApp\Config\Crud;

use App\Models\Employee;
use Fjord\Crud\CrudShow;
use Fjord\Crud\CrudIndex;
use Fjord\Support\Facades\Fjord;
use Fjord\Crud\Config\CrudConfig;

class StargazerConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Employee::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = StargazerController::class;

    /**
     * Preview route.
     *
     * @param Employee $employee
     * @return string
     */
    public function previewRoute(Employee $employee)
    {
        return route('home');
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
            $table->col('Type')
                ->value('stargazer');
            $table->col('Lastname')
                ->value('{last_name}')
                ->sortBy('last_name');

            $table->col('Firstname')
                ->value('{first_name}')
                ->link('crud/employees/{id}/edit#email')
                ->sortBy('first_name');
        })
            ->search('first_name', 'last_name')
            ->width(12);
    }

    /**
     * Model singular and plural name.
     *
     * @return array $names
     */
    public function names()
    {
        return [
            'singular' => '{first_name} {last_name}',
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

            $form->group(function ($col) {
                $col->input('first_name')
                    ->title('Firstname')
                    ->rules('max:50')
                    ->creationRules('required')
                    ->width(12);

                $col->input('last_name')
                    ->title('Lastname')
                    ->rules('max:60')
                    ->creationRules('required')
                    ->width(12);
            })->width(7);

            $form->image('images') // images is the corresponding media collection.
                ->translatable()
                ->title('Images')
                ->firstBig()
                ->hint('Image Collection.')
                ->maxFiles(5);



            $form->input('email')
                ->rules('max:60')
                ->title('E-mail')
                ->creationRules('required')
                ->width(6);
        })->width(12)->title('Main');
    }
}
