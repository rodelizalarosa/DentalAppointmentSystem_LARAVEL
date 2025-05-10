<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\AppointmentStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointment_statuses', function (Blueprint $table) {
            $table->id();
             $table->string('name');
            $table->timestamps();
        });

        $appointmentStatuses = [
            ['name' => 'Pending'],
            ['name' => 'Confirmed'],
            ['name' => 'Completed'],
            ['name' => 'Cancelled'],
        ];

        foreach ($appointmentStatuses as $status) {
            AppointmentStatus::create($status);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_statuses');
    }
};
