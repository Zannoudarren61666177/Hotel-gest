<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hotels')->cascadeOnDelete();
            $table->string('nom', 100);
            $table->text('description')->nullable();
            $table->decimal('prix', 10, 2)->default(0);
            $table->boolean('disponible')->default(true);
            $table->string('categorie', 50)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
};