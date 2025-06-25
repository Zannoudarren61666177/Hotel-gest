<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hotels')->cascadeOnDelete();
            $table->string('numero', 20);
            $table->string('type', 50)->nullable();
            $table->integer('capacite');
            $table->decimal('prix', 10, 2);
            $table->enum('statut', ['disponible', 'occupee', 'maintenance'])->default('disponible');
            $table->text('description')->nullable();
            $table->json('images')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};