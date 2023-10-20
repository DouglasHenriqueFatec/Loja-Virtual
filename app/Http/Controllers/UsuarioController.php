<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuarioController extends Controller 
{
    var $usuario;

    public function __construct() {
        $this->usuario = new usuarios();
    }

    public function index(Request $request){
        $data = [];
        return view('profile', ['data' => $data]);
    }
}
