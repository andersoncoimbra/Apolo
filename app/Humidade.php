<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Humidade extends Model
{
    //
    public function allhumi(){
        return self::all();
    }
}
