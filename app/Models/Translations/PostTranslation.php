<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    

    /**
     * Timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Fillable attributes.
     *
     * @var array
     */
    protected $fillable = ['title'];

    
}
