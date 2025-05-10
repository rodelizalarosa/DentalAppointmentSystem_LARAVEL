<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Appointment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');
            $table->foreignId('dentist_id')->constrained('dentists')->onDelete('cascade');
            $table->foreignId('appointment_status_id')->constrained('appointment_statuses')->onDelete('cascade');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->timestamps();
        });

        $Appointments = [

            [
                'patient_id' => 1,
                'dentist_id' => 1,
                'appointment_status_id' => 1,
                'appointment_date' => '2025-05-15',
                'appointment_time' => '10:00:00',
            ],

        ];

        foreach ($Appointments as $appointment) {
            Appointment::create($appointment);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
