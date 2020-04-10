<?php

namespace App\Models;

use Fjord\Fjord\Models\Model as FjordModel;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Article extends FjordModel implements HasMedia, TranslatableContract
{
    use HasMediaTrait, Translatable;

    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = ['title', 'text'];
    public $translatedAttributes = ['title', 'text'];
    protected $appends = ['image', 'translation'];
    protected $with = ['media', 'translations'];



    /**
     * Append the image column to each query.
     *
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image');
    }

    public function registerMediaConversions(Media $media = null)
    {
        foreach (config('fjord.mediaconversions.default') as $key => $value) {
            $this->addMediaConversion($key)
                ->width($value[0])
                ->height($value[1])
                ->sharpen($value[2]);
        }
    }

    /**
     * Append the translation to each query.
     *
     */
    public function getTranslationAttribute()
    {
        return $this->getTranslationsArray();
    }


    /**
     * The getRoute function is needed when your CRUD-Model has a
     * preview view, which is defined in the fjord-resources crud config file.
     * In order to use it, you should define a named route in routes/web.php
     *
     */
    public function getRoute()
    {
        return '';
        //return route('articles', ['id' => $this->id]);
    }
}
