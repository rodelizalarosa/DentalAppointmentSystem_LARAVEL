<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Patient;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unique();
            $table->string('phone_number');
            $table->string('address')->nullable();
            $table->date('birthdate');
            $table->enum('gender', ['Male', 'Female']);

            $table->timestamps();
        });

        $patients = [
            [

                'user_id' => 2,
                'phone_number' => '09918765432',
                'address' => 'Ward III, Minglanilla',
                'birthdate' => '2002-10-02',
                'gender' => 'Female',

            ],

        ];

        foreach($patients as $patient){
            Patient::create($patient);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
