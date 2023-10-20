<?php

namespace App\Http\Controllers;

use App\Models\categorias;
use App\Models\enderecos;
use App\Models\usuarios;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    var $categoria;
    var $usuario;
    var $endereco;
    public function __construct()
    {
        $this->categoria = new categorias();
        $this->usuario = new usuarios();
        $this->endereco = new enderecos();
    }
    public function index(Request $request)
    {
        $data = [];

        $listarCategorias = $this->categoria::all();

        $data['categorias'] = $listarCategorias;

        return view('cadastrar', ['data' => $data]);
    }
    public function to_check(Request $request)
    {
        $data = [];
        //dd($request->email);
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
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
            $query = $this->usuario::where('email', $credenciais['email'])->count();
            //dd($query);
            if ($query) {
                return view('cadastrar', ['data' => $data]);
            }else{
                $data = [
                    'mensagem2' => 'E-mail já cadastrado'
                ];
                return view('profile', ['data' => $data]);
            }
        }catch (\Exception $e){
            $data = [
                'mensagem2' => 'Error -> ' . $e->getMessage()
            ];
            return view('profile', ['data' => $data]);
        }
    }
    public function endereco(Request $request)
    {
        $data = [];

        $listarCategorias = $this->categoria::all();

        $data['categorias'] = $listarCategorias;

        return view('endereco', ['data' => $data]);
    }

    public function salvar1(Request $request)
    {
        $data = [];
        $values = $request->all();
        $this->usuario->fill($values);
        $this->usuario->data_nascimento = $data = implode("-", array_reverse(explode("/", $request->data_nascimento)));
        // dd($this->usuario);
        try {
            $this->usuario->save();
            session(['usuario' => $this->usuario]);
            $data = session('usuario');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

        return view('endereco', ['data' => $data]);
    }

    public function salvar2(Request $request)
    {
        $dados = [];
        $values = $request->all();
        // dd($values);
        $this->endereco->fill($values);
        $this->endereco->id_usuario = session('usuario')->id;
        //dd($this->endereco);
        try {
            $this->endereco->save();
            session(['endereco' => $this->endereco]);
            $dados = session('endereco');
            //dd($this->endereco);
        } catch (\Exception $e) {
            echo 'Erro ao salvar os dados ' . $e->getMessage();
        }

        return redirect()->route('home');
    }

    public function atualizar(Request $request){
        $data = [];
        
        if(isset(session('usuario')['usuario_id'])){
            $query = $this->usuario::find(session('usuario')['usuario_id']);
            $data = [
                'usuario' => $query
            ];
            // dd($data);
            return view('cadastrar', ['data' => $data]);
            // dd($query);
        }else{
            echo 'usuario nao encontrado';
        }
    }

    public function update(Request $request){
        $data = [];
        $dados = $request->validate([
            'nome' => ['required'],
        ]);

    }
}
