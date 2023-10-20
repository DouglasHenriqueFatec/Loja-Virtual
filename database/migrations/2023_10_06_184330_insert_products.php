<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        $cat = new  \App\Models\categorias(['nome_categoria' => 'Geral']);
        $cat->save();
        $cat2 = new  \App\Models\categorias(['nome_categoria' => 'Medicamentos']);
        $cat2->save();
        $cat3 = new  \App\Models\categorias(['nome_categoria' => 'Perfumaria']);
        $cat3->save();

        $prod = new  \App\Models\produtos(['nome_produto' => 'Produto 1', 'descricao_produto' => 'Lorem Ipsum', 'preco' => '119.99', 'preco_promocional' => '99.99', 'id_categoria' =>$cat->id , 'status' => 'Ativo', 'link_imagem' => 'resources/images/produtos/1-8.jpeg']);
        $prod->save();
        $prod2 = new  App\Models\produtos(['nome_produto' => 'Produto 2', 'descricao_produto' => 'Lorem Ipsum', 'preco' => '119.99', 'preco_promocional' => '99.99', 'id_categoria' =>$cat->id , 'status' => 'Ativo', 'link_imagem' => 'resources/images/produtos/1-8.jpeg']);
        $prod2->save();
        $prod3 = new  App\Models\produtos(['nome_produto' => 'Produto 3', 'descricao_produto' => 'Lorem Ipsum', 'preco' => '119.99', 'preco_promocional' => '99.99', 'id_categoria' =>$cat->id , 'status' => 'Ativo', 'link_imagem' => 'resources/images/produtos/1-8.jpeg']);
        $prod3->save();
        $prod4 = new  App\Models\produtos(['nome_produto' => 'Produto 4', 'descricao_produto' => 'Lorem Ipsum', 'preco' => '119.99', 'preco_promocional' => '99.99', 'id_categoria' =>$cat->id , 'status' => 'Ativo', 'link_imagem' => 'resources/images/produtos/1-8.jpeg']);
        $prod4->save();
        $prod5 = new  App\Models\produtos(['nome_produto' => 'Produto 5', 'descricao_produto' => 'Lorem Ipsum', 'preco' => '119.99', 'preco_promocional' => '99.99', 'id_categoria' =>$cat->id , 'status' => 'Ativo', 'link_imagem' => 'resources/images/produtos/1-8.jpeg']);
        $prod5->save();
        $prod6 = new  App\Models\produtos(['nome_produto' => 'Produto 6', 'descricao_produto' => 'Lorem Ipsum', 'preco' => '119.99', 'preco_promocional' => '99.99', 'id_categoria' =>$cat->id , 'status' => 'Ativo', 'link_imagem' => 'resources/images/produtos/1-8.jpeg']);
        $prod6->save();
    }

    public function down(): void
    {
        //
    }
};
