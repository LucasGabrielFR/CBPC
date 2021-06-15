<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['nome','data_nascimento','cidade','estado','cpf','codigo_transf','contato','imagem','status'];
}
