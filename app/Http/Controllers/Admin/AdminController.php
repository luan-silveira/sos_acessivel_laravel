<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ocorrencia;

class AdminController extends Controller {
    
    public function index(){
        return view('admin.index');
    }
}

