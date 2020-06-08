<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kunde extends Model
{
    //
    protected $fillable = [
        'vorname',
        'nachname',
        'gewerblicher_kunde'
    ];
}
