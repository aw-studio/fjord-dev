<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia\HasMedia;
use Fjord\Fjord\Models\Model as FjordModel;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Department extends FjordModel implements HasMedia
{
    use HasMediaTrait;
    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = ['name', 'employees_relation'];

    protected $appends = ['employees_count'];


    public function getEmployeesCountAttribute()
    {
        return $this->employees()->count();
    }


    public function content()
    {
        return $this->blocks('content');
    }

    /**
     * Relations
     *
     *
     */
    public function employees()
    {
        return $this->hasMany('App\Models\Employee');
    }
    public function employees_has_many()
    {
        return $this->hasMany('App\Models\Employee');
    }
    public function employees_relation()
    {
        return $this->formMany('App\Models\Employee');
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
