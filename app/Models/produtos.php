<?php

namespace App\Models;

use App\Models\baseModel;
class produtos extends baseModel
{
    protected $table = 'produtos';  
    protected $fillable = [
        'nome_produto',
        'descricao_produto',
        'preco',
        'preco_promocional',
        'id_categoria',
        'status',
        'link_imagem'
    ];
}
