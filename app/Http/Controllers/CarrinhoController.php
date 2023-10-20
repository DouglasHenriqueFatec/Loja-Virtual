<?php

namespace App\Http\Controllers;

use App\Models\produtos;
use App\Models\categorias;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    var $produto;
    var $categoria;
    public function __construct()
    {
        $this->produto = new produtos();
        $this->categoria = new categorias();
    }
    public function adicionarCarrinho($id_produto = 0, Request $request)
    {
        $data = [];
        $prod = $this->produto::find($id_produto);
        if ($prod) {
            $carrinho = session('cart', []);
            array_push($carrinho, $prod);
            session(['cart' => $carrinho]);
        }
        // $listarProdutos = $prod->get();
        // // echo '<pre>';
        // // var_dump($listarProdutos);
        // $data['lista'] = $listarProdutos;

        // return view('carrinho', ['data' => $data]);
        return redirect()->route('home');
    }

    public function verCarrinho(Request $request)
    {
        $data = [];

        $listarCategorias = $this->categoria::all();
        $carrinho = session('cart', []);
        $data = ['cart' => $carrinho];
        // dd($data['cart']);
        $data['categorias'] = $listarCategorias;

        return view('carrinho', ['data' => $data]);
    }

    public function excluirCarrinho($indice, Request $request)
    {
        $carrinho = session('cart', []);
        if (isset($carrinho[$indice])) {
            unset($carrinho[$indice]);
        }
        session(['cart' => $carrinho]);

        return redirect()->route('ver_carrinho');
    }
}
