<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Schedule extends Model
{
    use HasFactory;
    protected $table = 'immunization_schedule';
    protected $fillable = [
        'id_schedule',
        'year',
        'month',
        'id_admin'
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id');
    }
    public function vaccines(): HasMany
    {
        return $this->hasMany(Vaccines::class, 'id_schedule');
    }
}
