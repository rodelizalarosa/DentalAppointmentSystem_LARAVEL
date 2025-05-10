<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'dentist_id',
        'appointment_status_id',
        'appointment_date',
        'appointment_time',
    ];

    public function appointmentStatus(){
        return $this->belongsTo(AppointmentStatus::class, 'appointment_status_id');
    }

    public function dentalServices(){
        return $this->belongsToMany(DentalServices::class, 'appointment_services');
    }

    public function patient(){
        return $this->belongsTo(Patient::class);
    }

    public function dentist(){
        return $this->belongsTo(Dentist::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
