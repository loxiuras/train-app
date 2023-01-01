<?php

use App\Models\Carriage;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('carriages', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('class_type')->default(Carriage::CLASS_TYPE_mixed);
            $table->integer('seats')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carriages');
    }
};
