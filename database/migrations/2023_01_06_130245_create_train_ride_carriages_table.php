<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('train_ride_carriages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('train_ride_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('carriage_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('train_ride_carriages');
    }
};
