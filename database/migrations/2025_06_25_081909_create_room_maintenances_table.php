<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('room_maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->string('type', 50)->nullable();
            $table->text('commentaire')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_maintenances');
    }
};