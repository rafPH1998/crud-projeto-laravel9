<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body',
        'visible'
    ];
    
    protected $casts = [
        'visible' => 'boolean'
    ];

    public function user() {
        //RETORNA O COMENTARIO DO USUARIO
        //BELONGSTO = PERTENCE A
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
