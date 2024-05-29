<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;

class Admin extends AuthenticatableUser implements Authenticatable
{
    use HasFactory;

    protected $table = 'admin';
    protected $fillable = [
        'id',
        'username',
        'password',
    ];

    public function isAdmin()
    {
        return true;
    }

    public function schedule()
    {
        return $this->hasMany(Schedule::class, 'id_admin');
    }
    public function InformationVaccine()
    {
        return $this->hasMany(InformationVaccine::class, 'id_admin');
    }
}
