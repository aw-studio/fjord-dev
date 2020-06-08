<?php

namespace App\Models;

use Fjord\Crud\Models\Traits\TrackEdits;
use Fjord\Crud\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class Department extends Model implements HasMediaContract
{
    use TrackEdits,
        HasMedia;

    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = ['name', 'employees_relation', 'active'];

    protected $appends = ['employees_count'];

    protected $with = ['employee'];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function getEmployeesCountAttribute()
    {
        return $this->employees()->count();
    }

    public function articles()
    {
        return $this->manyRelation(Article::class, 'articles');
    }

    public function article()
    {
        return $this->oneRelation(Article::class, 'article');
    }

    public function content()
    {
        return $this->blocks('content');
    }

    public function block()
    {
        return $this->blocks('block');
    }

    /**
     * Relations
     *
     *
     */
    public function employee()
    {
        return $this->hasOne('App\Models\Employee');
    }
    public function employees()
    {
        return $this->hasMany('App\Models\Employee')->orderBy('order_column');
    }
    public function employees_has_many()
    {
        return $this->hasMany('App\Models\Employee');
    }

    /**
     * manyRelation.
     *
     * @return BelongsToMany
     */
    public function employees_relation()
    {
        return $this->manyRelation('App\Models\Employee', 'employees_relation');
    }
    public function employees_belongs_to_many()
    {
        return $this->belongsToMany('App\Models\Employee')->orderBy('order_column');
    }

    public function tags_morph_to_many()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }

    public function comments_morph_many()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function executives()
    {
        return $this->hasMany(\App\Models\Employee::class);
    }
}
