<?php

namespace App\Http\Controllers;

use App\Humidade;
use App\Parceiro;
use App\Temperature;
use Illuminate\Http\Request;

use App\Http\Requests;

class CadastroController extends Controller
{
    //
    protected $temp = null;
    protected $humi = null;

    public function __construct(Temperature $temp, Humidade $humidade)
    {
        $this->temp = $temp;
        $this->humi = $humidade;
    }

    public function allregistros($id){

        return ['Temperatura'=> $this->temp->alltemp(), 'Humidade'=> $this->humi->allhumi()];
    }
    public function registro(Request $request){

        $temp = new Temperature();
        $temp->idref = $request->id;
        $temp->valor = $request->temp;
        $temp->save();

        $humi = new Humidade();
        $humi->idref = $request->id;
        $humi->valor = $request->humidade;
        $humi->save();

        return ['Temperatura'=> $temp, 'Humidade'=> $humi];
    }

}
