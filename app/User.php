<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'first name',
        'last name',
        'email',
        'role',
        'password',
        'snumber',
    ];
}
