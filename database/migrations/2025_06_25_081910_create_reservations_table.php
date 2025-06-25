<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('room_id')->constrained('rooms')->cascadeOnDelete();
            $table->foreignId('hotel_id')->constrained('hotels')->cascadeOnDelete();
            $table->date('date_debut');
            $table->date('date_fin');
            $table->enum('statut', ['a_venir', 'en_cours', 'passee', 'annulee', 'remboursee'])->default('a_venir');
            $table->decimal('montant_total', 10, 2);
            $table->decimal('frais_annulation', 10, 2)->default(0);
            $table->decimal('montant_rembourse', 10, 2)->default(0);
            $table->string('bon_reservation')->nullable();
            $table->string('numero_unique', 50)->unique();
            $table->timestamp('date_reservation')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};