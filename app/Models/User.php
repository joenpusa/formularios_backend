<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'tipo_documento',
        'num_documento',
        'chk_social',
        'chk_social_all',
        'chk_reportes',
        'chk_reportes_all',
        'chk_usuarios',
        'chk_tecnico',
        'chk_tecnico_all',
        'chk_galeria',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Scope para buscar por cualquier palabra en los campos relevantes.
     */
    public function scopeSearch($query, $term)
    {
        if ($term) {
            $term = "%{$term}%";
            $query->where(function ($q) use ($term) {
                $q->where('name', 'like', $term)
                  ->orWhere('email', 'like', $term)
                  ->orWhere('tipo_documento', 'like', $term)
                  ->orWhere('num_documento', 'like', $term);
            });
        }
    }
}
