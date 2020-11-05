<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    
    protected $fillable = [
        'postagem', 'imagem'
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'id');
    }
}
