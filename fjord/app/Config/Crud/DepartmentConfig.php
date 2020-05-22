<?php

namespace FjordApp\Config\Crud;

use App\Models\Article;
use App\Models\Employee;
use Fjord\Crud\CrudForm;
use App\Models\Department;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Illuminate\Database\Eloquent\Builder;
use FjordApp\Controllers\Crud\DepartmentController;

class DepartmentConfig extends CrudConfig
{

    /**
     * Model class.
     *
     * @var string
     */
    public $model = Department::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = DepartmentController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['name'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    /**
     * Initialize index query.
     *
     * @param Builder $query
     * @return Builder $query
     */
    public function indexQuery(Builder $query)
    {
        return $query;
    }

    /**
     * Setup index table.
     *
     * @param CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->col('Department Name')
            ->value('{name}')
            ->sortBy('name');

        $table->col('Employees')
            ->value('{employees_count}')
            ->sortBy('employees_count');

        $table->toggle('active')
            ->label('')
            ->routePrefix($this->routePrefix())
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
            'singular' => ucfirst(__f('models.department')),
            'plural' => ucfirst(__f('models.departments')),
        ];
    }

    /**
     * Setup create and edit form.
     *
     * @param CrudTable $form
     * @return void
     */
    public function form(CrudForm $form)
    {
        /*
        $form->info('Firmenadresse')
            ->cols(4)
            ->text('Diese Adresse erscheint auf Ihren Rechnungen. In Ihren Versandeinstellungen können Sie die Adresse bearbeiten, die für die Berechnung der Versandtarife verwendet wird.')
            ->text('Ihr Hauptgeschäftsstandort kann beeinflussen, welche Apps in Ihrem Shop verwendet werden können. <a href="#">Weitere Informationen über die Kompatibilität von Apps</a>');

        $form->card(function ($form) {

            $form->info('FORMAT DER BESTELLNUMMER BEARBEITEN (OPTIONAL)')
                ->model('name')
                ->cols(12)
                ->text('Bestellnummern beginnen standardmäßig bei #1001. Sie können die Bestellnummer selbst nicht ändern. Sie können jedoch ein Präfix oder Suffix hinzufügen, um IDs wie "EN1001" oder "1001-A" zu erstellen.');

            $form->input('length')
                ->title('Length')
                ->type('number')
                ->placeholder('The length in cm')
                ->hint('Enter the length in cm.')
                ->append('cm')
                ->cols(12);

            $form->input('suffix')
                ->title('Suffix')
                ->cols(6);

            $form->component('test')->model('prefix')->cols(12);
        })->cols(8)->class('md-2');

        $form->line();
        */

        $form->card(function ($form) {

            $form->manyRelation('articles')
                ->model(Article::class)
                ->preview(function ($preview) {
                    $preview->col('Title')->value('{title}');
                })
                ->title('Articles')
                ->cols(12);

            $form->relation('employees')
                ->title('Employees')
                ->sortable()
                ->preview(function ($table) {
                    $table->col('id');
                    $table->col('first_name');
                });

            /*
            $form->blocks('block')
                ->title('Blocks')
                ->repeatables(function ($rep) {
                    $rep->add('one relation', function ($form) {
                        $form->oneRelation('employee')->model(Employee::class);
                    });
                    $rep->add('many relation', function ($form) {
                        $form->manyRelation('employees')->model(Employee::class);
                    });
                });
                */
        })->title('BelongsToMany')->class('');
    }

    /**
     * Main card fields.
     *
     * @param CrudTable $form
     * @return void
     */
    protected function mainForm(CrudForm $form)
    {
        $form->input('name')
            ->max(60)
            ->title('Title')
            ->placeholder('Title')
            ->hint('The project\'s title')
            ->cols(8);

        $form->relation('comments_morph_many')
            ->title('Comments morphMany')
            ->preview(function ($table) {
                $table->col('first_name');
            });
    }
}
