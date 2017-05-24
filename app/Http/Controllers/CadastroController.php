<?php

namespace App\Http\Controllers;

use App\Parceiro;
use App\Temperature;
use Illuminate\Http\Request;

use App\Http\Requests;

class CadastroController extends Controller
{
    //
    protected $temp = null;

    public function __construct(Temperature $temp)
    {
        $this->temp = $temp;
    }

    public function allregistros($id){

        return $this->temp->alltemp()."- id:".$id;
    }
    public function registro(Request $request){

        $temp = new Temperature();
        $temp->idref = $request->id;
        $temp->valor = $request->temp;
        $temp->save();

        return $temp;
    }

}
