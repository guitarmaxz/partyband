<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    protected $table = 'instrumentos';
    protected $fillable = [
        'descricao'
    ];

    public function musicos()
    {
        return $this->belongsToMany(Musico::class, 'instrumentos_musicos', 'inst_id', 'musico_id');
    }
}
