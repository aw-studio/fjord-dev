<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;

class Taggable extends Model
{
    use TrackEdits;

    public $timestamps = false;
}
