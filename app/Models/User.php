<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getUsers(string|null $search = '') {
        $users = $this->where(function ($query) use ($search) {
            if($search) {
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })
        ->with('comments')
        ->paginate(2);

        return $users;
    }

    public function comments() {
        //RELAÇÃO DE UM PARA MUITOS = UM USUARIOS PARA MUITOS COMENTARIOS. 
        //RETORNA O COMENTARIO DOS USUARIOS
        return $this->hasMany(Comment::class);
    }

}
