<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentServices extends Model
{
    use HasFactory;

   protected $fillable = [
        'appointment_id',
        'dental_service_id',
        'treatment_status_id',  
        'total_cost',  
    ];

    public function appointment(){
        return $this->belongsTo(Appointment::class);
    }

    public function dentalService(){
        return $this->belongsTo(DentalService::class);
    }

    public function treatmentStatus(){
        return $this->belongsTo(TreatmentStatus::class); // Define the relationship with TreatmentStatus
    }

    public function payments(){
        return $this->hasMany(Payment::class);
    }
}
