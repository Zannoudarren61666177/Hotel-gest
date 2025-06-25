<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('hotel_id')->constrained('hotels')->cascadeOnDelete();
            $table->foreignId('room_id')->nullable()->constrained('rooms')->nullOnDelete();
            $table->text('commentaire')->nullable();
            $table->integer('note');
            $table->timestamp('date')->useCurrent();
            $table->enum('statut', ['publie', 'masque', 'supprime', 'en_attente'])->default('publie');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};