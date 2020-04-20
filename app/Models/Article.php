<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Fjord\Crud\Models\Traits\HasMedia;
use Fjord\Crud\Models\Traits\TrackEdits;
use Fjord\Crud\Models\Traits\Translatable;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaContract;

class Article extends Model implements HasMediaContract
{
    use TrackEdits,
        HasMedia,
        Translatable;

    /**
     * Fillables.
     *
     * @var array
     */
    protected $fillable = ['title', 'text'];

    /**
     * Translated attributes.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'text'];

    /**
     * Appends.
     *
     * @var array
     */
    protected $appends = ['image', 'translation'];

    /**
     * Eger loads.
     *
     * @var array
     */
    protected $with = ['media', 'translations'];

    /**
     * Append the image column to each query.
     *
     * @return \Spatie\MediaLibrary\Models\Media
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image');
    }
}
