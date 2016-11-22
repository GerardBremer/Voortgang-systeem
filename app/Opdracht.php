<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opdracht extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'opdrachten';

    //public $timestamps = false;
    //public $incrementing = false;

    // Opdrachten horen bij leereenheden
    public function leereenheid() {
    	return $this->belongsTo('App\Leereenheid');
    }
}
