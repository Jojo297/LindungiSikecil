<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformationVaccine extends Model
{
    use HasFactory;

    protected $table = 'information_vaccine';
    protected $fillable = [
        'id_information',
        'heading',
        'body',
        'id_admin'
    ];
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id');
    }
}
