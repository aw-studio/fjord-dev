<?php

namespace App\Models;

use Fjord\Crud\Models\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;

class ProjectStatus extends Model implements HasMediaContract
{
    use TrackEdits, HasMedia;

    // enter all fillable columns. translated columns must also
    // be set fillable. don't forget to also set them fillable in
    // the coresponding translation-model
    protected $fillable = ['title'];
}
