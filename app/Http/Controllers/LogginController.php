<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;
use App\Models\usuarios;
use App\Models\enderecos;
class LogginController extends Controller
{
    var $usuario;
    var $endereco;
    public function __construct()
    {
        $this->usuario = new usuarios();
        $this->endereco = new enderecos();
    }

    public function auth(Request $request)
    {
        $data = [];
        // dd($request);
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (session('usuario')) {
            session([
                'usuario' => [
                    'usuario_nome' => '',
                    'usuario_id' => ''
                ],
            ]);
        }
        //print_r(session('usuario'));
        try {
            $query = $this->usuario::where('email', $credenciais['email'])->first();
            $endereco = $this->endereco::where('id_usuario', $query->id)->first();
            //dd($endereco);
            if ($query) {
                $senha = $this->usuario::where('password', $credenciais['password'])->count();
                if ($senha) {
                    $query = $this->usuario::where('email', $credenciais['email'])->get();
                    foreach ($query as $q) {
                        session([
                            'usuario' => [
                                'usuario_nome' => $q->nome,
                                'usuario_id' => $q->id,
                                'usuario_cep' => $endereco->cep
                            ],
                        ]);
                        //dd(session('usuario'));
                    }

                    return redirect()->route('ver_carrinho');
                } else {
                    session_start();

                    if (session('usuario')) {
                        session([
                            'usuario' => [],
                        ]);
                    }
                    $data = [
                        'mensagem' => 'Email ou senha incorretos'
                    ];
                    return view('profile', ['data' => $data]);
                }
            } else {
                session_start();
                //dd(session('usuario'));
                if (session('usuario')) {
                    session([
                        'usuario' => [],
                    ]);
                }
                $data = [
                    'mensagem' => 'Email não encontrado'
                ];
                return view('profile', ['data' => $data]);
            }
        } catch (\Exception $e) {
            echo 'Erro ' . $e->getMessage();
        }
    }

    public function logout(Request $request)
    {
        $data = [];
        session_start();
        if (session('usuario')) {
            session([
                'usuario' => [],
            ]);
        }
        return view('cadastrar');
    }
}
