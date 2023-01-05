<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table): void {
            $table->id();
            $table->string('type');
            $table->string('customer_number')->nullable();
            $table->string('staff_number')->nullable();
            $table->string('name');
            $table->date('date_of_birth');
            $table->string('street')->nullable();
            $table->integer('house_number')->nullable();
            $table->string('house_number_extra')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('city')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
