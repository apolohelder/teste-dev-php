<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Os atributos que são de massa atribuível.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_master',
    ];

    /**
     * Os atributos que devem ser ocultos para serialização.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Obter os atributos que devem ser lançados.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', 'password' => 'hashed',
        ];
    }

     /**
     * Substituir o método que define o campo de autenticação
     */
    public function username()
    {
        return 'username';
    }

    /**
     * Definir o relacionamento com os produtos
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id'); // user_id é a chave estrangeira na tabela products
    }
}
