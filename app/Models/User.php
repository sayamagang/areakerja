<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Fortify\TwoFactorAuthenticatable;

// Spatie Permission
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    // use HasFactory;
    use HasApiTokens, Notifiable, HasRoles, TwoFactorAuthenticatable;

    protected $fillable = [
        'photo',
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function candidate()
    {
        return $this->hasOne(Candidate::class, 'user_id', 'id');
    }

    public function partner()
    {
        return $this->hasOne(Partner::class, 'user_id', 'id');
    }
}
