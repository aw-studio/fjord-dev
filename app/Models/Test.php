<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia as HasMediaContract;
use Fjord\Crud\Models\Traits\HasMedia;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Fjord\Crud\Models\Traits\Translatable;

class Test extends Model implements HasMediaContract, TranslatableContract
{
    use HasMedia, Translatable;

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
     * Eager loads.
     *
     * @var array
     */
    protected $with = ['media', 'translations'];

    /**
     * Append the image column to each query.
     *
     */
    public function getImageAttribute()
    {
        return $this->getMedia('image');
    }

    /**
     * Register media conversions.
     *
     * @param Media $media
     * @return void
     */
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
     * @return array
     */
    public function getTranslationAttribute()
    {
        return $this->getTranslationsArray();
    }
}
