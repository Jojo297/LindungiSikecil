<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildGrowth extends Model
{
    use HasFactory;
    protected $primaryKey = 'Id_growth';
    protected $table = 'child_growth';
    protected $fillable = [
        'Id_growth',
        'age',
        'weight',
        'body_length',
        'head_circumference',
        'id_child'
    ];
    public function child()
    {
        return $this->belongsTo(Child::class, 'id_child');
    }
}
