<?php

namespace App;
use App\Opdracht;
use App\Leereenheid;
use App\Feedback;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'feedback';

}
