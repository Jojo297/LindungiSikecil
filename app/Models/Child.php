<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $table = 'child';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name',
        'date_of_birth',
        'gender',
        'id_parent',
    ];
    public function parent()
    {
        return $this->belongsTo(Parents::class, 'id_parent');
    }
    public function schedules()
    {
        return $this->belongsToMany(Schedule::class, 'child_schedule', 'id_child', 'id_schedule')
            ->withPivot('status', 'created_at', 'updated_at');
    }
    public function growths()
    {
        return $this->hasMany(ChildGrowth::class, 'id_child');
    }
}
