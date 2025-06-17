<?php

namespace App\Models;
<<<<<<< HEAD
=======

use Laravel\Sanctum\HasApiTokens;          
>>>>>>> ba6f3a070c62a7c35fcb585a80bb83cf2d795c34
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;  // Adiciona o trait do Sanctum
// ou
// use Laravel\Passport\HasApiTokens;  // Se estiver usando Passport, descomente esta linha

class User extends Authenticatable
{
<<<<<<< HEAD
    use HasFactory, Notifiable, HasApiTokens;  // Adiciona o HasApiTokens aqui
=======
    use HasApiTokens, HasFactory, Notifiable;  
>>>>>>> ba6f3a070c62a7c35fcb585a80bb83cf2d795c34

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

<<<<<<< HEAD
    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
=======
>>>>>>> ba6f3a070c62a7c35fcb585a80bb83cf2d795c34
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
