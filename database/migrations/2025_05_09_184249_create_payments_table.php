<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Payment;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appointment_id')->constrained()->onDelete('cascade');
            $table->foreignId('payment_status_id')->constrained('payment_statuses')->onDelete('cascade');
            $table->decimal('amount', 8, 2);  // The amount paid
            $table->date('payment_date');     // Date of payment
            $table->timestamps();
        });

        $Payments = [

            [
                'appointment_id' => 1,   // The ID of the service paid for
                'payment_status_id' => 2,         // The ID of the payment status ("Completed")
                'payment_date' => '2025-05-09',   // The date of the payment
            ]

        ];

        foreach ($Payments as $payment) {
            Payment::create($payment); // Assuming Payment is the model associated with the payments table
        }
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
