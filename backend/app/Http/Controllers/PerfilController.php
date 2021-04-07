<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function perfil($tag){
        return 'perfil ' . $tag;
    }
}
