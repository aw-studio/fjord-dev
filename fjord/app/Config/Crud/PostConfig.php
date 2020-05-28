<?php

namespace FjordApp\Config\Crud;

use Fjord\Crud\CrudForm;
use Fjord\Vue\Crud\CrudTable;
use Fjord\Crud\Config\CrudConfig;
use Fjord\Crud\Fields\Blocks\Repeatables;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Post;
use FjordApp\Controllers\Crud\PostController;

class PostConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Post::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = PostController::class;

    /**
     * Index table search keys.
     *
     * @var array
     */
    public $search = ['title'];

    /**
     * Index table sort by default.
     *
     * @var string
     */
    public $sortByDefault = 'id.desc';

    /**
     * Model singular and plural name.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => ucfirst(__f('models.posts')),
            'plural' => ucfirst(__f('models.posts')),
        ];
    }

    /**
     * Sort by keys.
     *
     * @return array
     */
    public function sortBy()
    {
        return [
            'id.desc' => __f('fj.sort_new_to_old'),
            'id.asc' => __f('fj.sort_old_to_new'),
        ];
    }

    /**
     * Initialize index query.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder $query
     */
    public function indexQuery(Builder $query)
    {
        // $query->with('relation');

        return $query;
    }

    /**
     * Index table filter groups.
     *
     * @return array
     */
    public function filter()
    {
        return [
            // Filter have to be in groups.
            'Fitler Group Title' => [

                // Use scopes as filter.
                'scopeName' => 'Description',
            ],
        ];
    }

    /**
     * Build index table.
     *
     * @param \Fjord\Vue\Crud\CrudTable $table
     * @return void
     */
    public function index(CrudTable $table)
    {
        $table->component('fj-col-image')
            ->src('{image.conversion_urls.sm}')
            ->maxWidth('50px')
            ->label('Image')
            ->small();

        $table->col('Lastname')
            ->value('{last_name}')
            ->sortBy('last_name');
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
            $this->mainCard($form);
        })->width(12)->title('Main');
    }

    /**
     * Define form sections in methods to keep the overview.
     *
     * @param \Fjord\Crud\CrudForm $form
     * @return void
     */
    protected function mainCard(CrudForm $form)
    {
        $form->input('input')
            ->title('Block input')
            ->width(6);
    }
}
