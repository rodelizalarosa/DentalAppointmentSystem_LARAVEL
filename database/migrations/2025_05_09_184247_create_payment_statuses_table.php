<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\PaymentStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // e.g., "Pending", "Completed", etc.
            $table->timestamps();
        });

        $paymentStatuses = [
            ['name' => 'Pending'],
            ['name' => 'Completed'],
            ['name' => 'Failed'],
            ['name' => 'Cancelled'],
        ];

        foreach ($paymentStatuses as $status) {
            PaymentStatus::create($status);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_statuses');
    }
};
