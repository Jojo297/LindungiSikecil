<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildSchedule extends Model
{
    use HasFactory;

    protected $table = 'child_schedule';
    protected $fillable = [
        'id_child_schedule',
        'id_child',
        'id_schedule',
        'status'
    ];
    public function child()
    {
        return $this->belongsTo(Child::class, 'id_child');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'id_schedule', 'id_schedule');
    }
}
