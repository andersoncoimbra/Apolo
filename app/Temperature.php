<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temperature extends Model
{
    protected $fillable = ['idref', 'valor'];

    public function alltemp(){
    return self::all();
    }


}
