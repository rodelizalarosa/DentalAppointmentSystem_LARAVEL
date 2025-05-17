<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AppointmentServices;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointment_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->onDelete('cascade');
            $table->foreignId('dental_service_id')->constrained('dental_services')->onDelete('cascade');
            $table->foreignId('treatment_status_id')->constrained('treatment_statuses')->onDelete('cascade'); // NEW
            $table->decimal('total_cost', 8, 2); // Not nullable since it should always have a value
            $table->timestamps();
        });

        $appointmentServices = [
            [
                'appointment_id' => 1, 
                'dental_service_id' => 1,
                'treatment_status_id' => 1, //Pending
            ],
            [
                'appointment_id' => 1, 
                'dental_service_id' => 3,
                'treatment_status_id' => 1, //Pending
            ],
        ];

        foreach ($appointmentServices as $as) {
            $service = DentalService::find($as['dental_service_id']);
            if ($service) {
                $as['total_cost'] = $service->cost;
                AppointmentServices::create($as);
            }
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_services');
    }
};
