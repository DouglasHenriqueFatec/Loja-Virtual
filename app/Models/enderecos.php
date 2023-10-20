<?php

namespace App\Models;
use App\Models\baseModel;

class enderecos extends baseModel
{
    protected $table = 'enderecos';    
    protected $fillable = ['cep', 'logradouro', 'numero', 'bairro', 'cidade', 'complemento', 'cidades', 'estado', 'tipo', 'id_usuario'];
}
