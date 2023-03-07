<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('train_rides', function (Blueprint $table): void {
            $table->id();
            $table->string('number');
            $table->foreignId('train_track_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('direction')->default('forwards');
            $table->foreignId('train_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('train_rides');
    }
};
