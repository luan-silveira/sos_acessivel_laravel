<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('home');
    }
    
    public static function getSkin(){
        $skin = "";
        switch (Auth::user()->instituicao->id_instituicao_orgao){
            case 1:
                $skin = "red-light";
                break;
            case 2:
                $skin = "black";
                break;
            case 3:
                $skin = "black-light";
                break;
        }
        
        return $skin;
    }
}
