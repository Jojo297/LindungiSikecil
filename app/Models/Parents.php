<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;

class Parents extends AuthenticatableUser implements Authenticatable
{
    use Notifiable;
    // protected $table = 'parents';
    protected $guard = 'parents';
    protected $fillable = [
        'id_parent',
        'email',
        'username',
        'password',
        'no_wa',
        'otp'
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function getAuthPassword()
    {
        return $this->password;
    }
    public function getAuthIdentifierName()
    {
        return 'id_parent';
    }

    public function child()
    {
        return $this->hasMany(Child::class, 'id_parent');
    }
}
