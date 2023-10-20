<?php

namespace App\Models;

use App\Models\baseModel;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; 
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class usuarios extends baseModel implements AuthenticatableContract
{
    use Authenticatable;
    protected $table = 'usuarios';    
    protected $fillable = ['nome', 'cpf', 'data_nascimento', 'genero', 'email', 'telefone', 'password'];
}
