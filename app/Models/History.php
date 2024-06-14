<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'history_imunization';
    protected $primaryKey = 'id_history';
    protected $fillable = [
        'id_history',
        'immunization_date',
        'id_child',
        'id_schedule',
    ];
}
