<?php

namespace App\Http\Controllers;

use App\Models\produtos;
use App\Models\categorias;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    var $produto;
    var $categoria;
    public function __construct()
    {
        $this->produto = new produtos();
        $this->categoria = new categorias();
    }

    public function index(Request $request)
    {
        $data = [];

        $listarProdutos = $this->produto::all();
        $listarCategorias = $this->categoria::all();

        $data['categorias'] = $listarCategorias;
        // var_dump($listarProdutos);
        $data['lista'] = $listarProdutos;
        $data['id_produto'] = 0;

        return view('home', ['data' => $data]);
    }

    public function categoria(Request $request)
    {
        $data = [];

        $listarCategorias = $this->categoria::all();

        $listarProdutos = $this->produto::all();

        $data['categorias'] = $listarCategorias;
        $data['lista'] = $listarProdutos;
        $data['id_categoria'] = 0;
        $data['id_produto'] = 0;

        return view('categoria', ['data' => $data]);
    }

    public function busca_categoria($id_categoria = 0, Request $request)
    {
        $data = [];

        $listarCategorias = $this->categoria::all();

        $queryProdutos = $this->produto::limit(50);
        if ($id_categoria != 0) {
            $queryProdutos->where('id_categoria', $id_categoria);
        }

        $listarProdutos = $queryProdutos->get();
        // echo '<pre>';
        // var_dump($listarProdutos);
        $data['categorias'] = $listarCategorias;
        $data['lista'] = $listarProdutos;
        $data['id_categoria'] = $id_categoria;
        $data['id_produto'] = 0;

        return view('categoria', ['data' => $data]);
    }

}
