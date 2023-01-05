<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('train_track_stations', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('train_track_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('station_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('train_track_stations');
    }
};
