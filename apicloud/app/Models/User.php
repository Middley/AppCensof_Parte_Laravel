<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable implements JWTSubject {
    use Notifiable;

    protected $fillable = [
        'name','fullname','profession', 'cellphone', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ]; 
    
    protected $casts = [
        'name_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
}
