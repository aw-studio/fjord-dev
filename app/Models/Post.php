<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Fjord\Crud\Models\Traits\Translatable;

class Post extends Model implements TranslatableContract
{
    use TrackEdits, Translatable;

    /**
     * Setup Model:
     *
     * Enter all fillable columns. Translated columns must also be set fillable. 
     * Don't forget to also set them fillable in the coresponding translation-model!
     */

    
    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = ['title', 'text'];
    public $translatedAttributes = ['title', 'text'];
	protected $appends = ['translation'];
    protected $with = ['translations'];

    

        /**
     * Append the translation to each query.
     *
     * @return array
     */
    public function getTranslationAttribute()
    {
        return $this->getTranslationsArray();
    }

}
