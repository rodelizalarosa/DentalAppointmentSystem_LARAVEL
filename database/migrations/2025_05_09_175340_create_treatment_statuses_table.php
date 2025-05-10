<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\TreatmentStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('treatment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        $treatmentStatuses = [
            ['name' => 'Pending'],
            ['name' => 'Ongoing'],
            ['name' => 'Completed'],
            ['name' => 'Cancelled'],
        ];

        foreach ($treatmentStatuses as $treatmentStatus) {
            TreatmentStatus::create($treatmentStatus);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatment_statuses');
    }
};
