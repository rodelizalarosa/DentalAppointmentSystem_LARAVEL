<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\DentalService;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dental_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('cost', 8, 2);
            $table->timestamps();
        });

        $dentalServices = [
            ['name' => 'Teeth Cleaning', 'cost' => 1000.00],
            ['name' => 'Tooth Extraction', 'cost' => 1500.00],
            ['name' => 'Dental Filling', 'cost' => 1200.00],
            ['name' => 'Braces Installation', 'cost' => 25000.00],
            ['name' => 'Root Canal Treatment', 'cost' => 5000.00],
        ];

        foreach ($dentalServices as $dentalService) {
            DentalService::create($dentalService);
        }


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dental_services');
    }
};
