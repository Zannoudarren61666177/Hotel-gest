<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('reservation_id')->constrained('reservations')->cascadeOnDelete();
            $table->decimal('montant', 10, 2);
            $table->string('mode_paiement', 50);
            $table->enum('statut', ['en_attente', 'paye', 'annule', 'rembourse'])->default('en_attente');
            $table->timestamp('date')->useCurrent();
            $table->decimal('commission_plateforme', 10, 2)->default(0);
            $table->decimal('montant_reverse_hotel', 10, 2)->default(0);
            $table->timestamp('date_reversement')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};