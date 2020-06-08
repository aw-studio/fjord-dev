<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Fjord\Crud\Models\Traits\TrackEdits;

class Test extends Model 
{
    use TrackEdits;

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
    
    

    

    
}
