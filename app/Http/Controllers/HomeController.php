<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Temperature;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $temp = Temperature::take(10)->orderBy('created_at', 'desc')->get()->implode('valor', ', ');
        $labeltemp = Temperature::take(10)->select('created_at')->orderBy('created_at', 'desc')->get();
        //
        //$label =  $labeltemp;
        //foreach ($label as &$value) {            $value = date('H:i:s',strtotime($value));        }
        //dd($labeltemp);


        return view('home', ['temp'=>$temp, 'label'=>$labeltemp]);
    }
}
