<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Genero extends Model
{
    protected $table = 'generos';
    protected $fillable = [
        'descricao',
    ];
    public function musicos()
    {
        return $this->belongsToMany(User::class, 'generos_musicos', 'genero_id', 'musico_id');
    }

    public function bandas()
    {
        return $this->hasMany(Banda::class, 'genero', 'id');
    }
    
}
