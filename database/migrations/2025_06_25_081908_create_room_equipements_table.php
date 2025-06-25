<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('room_equipements', function (Blueprint $table) {
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->foreignId('equipement_id')->constrained('equipements')->cascadeOnDelete();
            $table->primary(['room_id', 'equipement_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('room_equipements');
    }
};