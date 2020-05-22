<?php

namespace App\Http\Controllers;

use Mockery as m;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Article;
use App\Models\Department;
use Fjord\Crud\Models\FormRelation;
use Fjord\Support\Facades\Form;

class TestController extends Controller
{
    public function __invoke()
    {
        dd((new Department)->hasOneThrough(Article::class, FormRelation::class, 'from_model_id', 'id', 'id', 'to_model_id'));
        dd((new Department)->hasOneThrough(Article::class, FormRelation::class, 'from_model_id', 'id', (new Department)->getKeyName(), (new Article)->getKeyName())
            ->where('form_relations.from_model_type', get_class(new Department))
            ->where('form_relations.to_model_type', Article::class)
            ->where('field_id', 'test'));
        $query = Department::whereLike('employee.first_name', 'rob');

        dd($query->toSql());

        dd($query->whereLike('title', 'test'));

        // assert
        $spy->shouldHaveReceived()
            ->where();
        $deparments = Department::whereLike('articles.title', 'test')->get();

        dd($deparments);


        $articles = Article::whereLike('title', 'a')->get();

        dd($articles);
    }
}
