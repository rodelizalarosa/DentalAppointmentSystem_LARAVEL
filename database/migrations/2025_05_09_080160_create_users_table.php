<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->foreignId('user_status_id')->constrained('user_statuses')->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        $users = [
            [

            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
            'user_status_id' => 1,

            ],
            [

            'first_name' => 'Rodeliza',
            'last_name' => 'La Rosa',
            'email' => 'rodeliza@gmail.com',
            'password' => Hash::make('password.123'),
            'role_id' => 2,
            'user_status_id' => 1,

            ],
            [

            'first_name' => 'Rasheed',
            'middle_name' => 'Paradela',
            'last_name' => 'Tapales',
            'email' => 'rasheed@gmail.com',
            'password' => Hash::make('123.password'),
            'role_id' => 3,
            'user_status_id' => 1,
            
            ],

        ];

        foreach($users as $user){
            User::create($user);
        }



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
