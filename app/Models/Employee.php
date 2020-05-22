<?php

namespace App\Models;

use Spatie\MediaLibrary\Models\Media;

use Fjord\Crud\Models\Traits\HasMedia;
use Fjord\Crud\Models\Traits\TrackEdits;

use Spatie\MediaLibrary\HasMedia as HasMediaContract;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model implements HasMediaContract
{
    use TrackEdits, HasMedia;

    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'department_id'
    ];

    protected $appends = ['image', 'fullName'];

    protected $with = ['media'];

    public function getResourceRoute()
    {
        return 'test/employees';
    }

    /**
     * Realtions
     *
     *
     */
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function projects()
    {
        return $this->belongsToMany('App\Models\Project', 'staff');
    }

    public function comments_morph_one()
    {
        return $this->morphOne('App\Models\Comment', 'commentable');
    }

    public function block()
    {
        return $this->blocks('block');
    }

    public function getImagesAttribute()
    {
        return $this->getMedia('images');
    }

    public function getImageAttribute()
    {
        return $this->getMedia('image')->first();
    }

    public function getFullNameAttribute()
    {
        return "{$this->last_name}, {$this->first_name} ";
    }

    /**
     * Scopes
     *
     *
     */
    public function scopeDevelopment($query)
    {
        return $query->where('department_id', 1);
    }
    public function scopeMarketing($query)
    {
        return $query->where('department_id', 2);
    }
    public function scopeProjectManagement($query)
    {
        return $query->where('department_id', 3);
    }
    public function scopeSales($query)
    {
        return $query->where('department_id', 4);
    }
    public function scopeHumanResources($query)
    {
        return $query->where('department_id', 5);
    }
}
