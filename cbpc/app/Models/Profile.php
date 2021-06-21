<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ["nome","descricao"];

    /**
     *  Get Permissions
     */

     public function permissions()
     {
         return $this->belongsToMany(Permission::class);
     }

}
