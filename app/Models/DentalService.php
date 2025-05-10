<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalService extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'name',
        'description',
        'cost',

    ];

    public function appointments(){
        return $this->belongsToMany(Appointment::class, 'appointment_services');
    }
}
