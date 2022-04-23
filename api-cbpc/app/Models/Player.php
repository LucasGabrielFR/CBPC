<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birthday',
        'country',
        'city',
        'uf',
        'phone',
        'cpf',
        'transfer_code',
        'avatar_path',
        'status',
    ];

    public function positions()
    {
        return $this->belongsToMany(
            Position::class,
            'player_positions',
            'player_id',
            'position_id'
        );
    }

    public function user()
    { 
      return $this->belongsTo(User::class);  
    }
}
