<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'immunization_schedule';
    protected $fillable = [
        'id_schedule',
        'type_vaccines',
        'year',
        'month',
        'id_admin'
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id');
    }
}
