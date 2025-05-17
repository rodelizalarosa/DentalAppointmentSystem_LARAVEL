<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'payment_status_id',
        'amount',
        'payment_date',
    ];

    // Relationship with AppointmentService
    public function appointmentService(){
        return $this->belongsTo(AppointmentService::class);
    }

    // Relationship with PaymentStatus
    public function paymentStatus(){
        return $this->belongsTo(PaymentStatus::class);
    }
}
