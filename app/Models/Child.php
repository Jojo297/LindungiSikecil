<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $table = 'child';
    protected $fillable = [
        'name',
        'date_of_birth',
        'gender'
    ];
    public function parent()
    {
        return $this->belongsTo(Parents::class, 'id_parent');
    }
}
