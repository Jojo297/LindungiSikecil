<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vaccines extends Model
{
    use HasFactory;
    protected $table = 'vaccines';
    protected $fillable = [
        'id_vaccine',
        'type_vaccine',
        'id_schedule',
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class, 'id_schedule');
    }
}
