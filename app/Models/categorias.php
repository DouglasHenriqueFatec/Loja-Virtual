<?php

namespace App\Models;

use App\Models\baseModel;

class categorias extends baseModel
{
    protected $table = 'categorias';    
    protected $fillable = ['nome_categoria', 'id_categoria_pai'];
}
