<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table): void {
            $table->id();
            $table->string('number')->unique();
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('drive')->nullable();
            $table->string('fuel_type')->nullable();
            $table->integer('horse_power')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
