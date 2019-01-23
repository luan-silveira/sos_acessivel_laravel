<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Ocorrencia;
use Carbon\Carbon;

class HomeController extends Controller {    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('home');
    }

    public function getTotalOcorrencias(Request $request) {
        
        $id_orgao = auth()->user()->instituicao->id_instituicao_orgao;
        $today = Carbon::today();
        $query = Ocorrencia::whereIn('id_tipo_ocorrencia', function($q) use ($id_orgao){
            $q->select('id')
                  ->from('tipo_ocorrencias')
                  ->where('id_instituicao_orgao', $id_orgao);
        });

        switch($request->periodo){
            case 0:
                $query->whereDate('data_ocorrencia', $today);
                break;
            case 1:
                $query->whereBetween('data_ocorrencia',
                        [$today->startOfWeek()->toDateTimeString(), $today->endOfWeek()->toDateTimeString()]);                
                break;
            case 2:
                $query->whereMonth('data_ocorrencia', $today->month);
                break;
            case 3:
                $query->whereYear('data_ocorrencia', $today->year);
                break;
        }
        
        $totalPendentes = (clone $query)->where('status', '0')->count();
        $totalAtendidas = (clone $query)->where('status', '1')->count();
        $totalFinalizadas = (clone $query)->where('status', '2')->count();

        return response()->json(compact('totalPendentes', 'totalAtendidas', 'totalFinalizadas'));
    }

    public static function getSkin() {
        $skin = "";
        switch (auth()->user()->instituicao->id_instituicao_orgao) {
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
