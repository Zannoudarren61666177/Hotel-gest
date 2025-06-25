<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->enum('type', ['avis', 'question', 'retour', 'signalement']);
            $table->enum('destinataire_role', ['admin_systeme', 'admin_hotel']);
            $table->unsignedBigInteger('destinataire_id')->nullable();
            $table->text('contenu');
            $table->timestamp('date')->useCurrent();
            $table->enum('statut', ['non_lu', 'lu', 'archive', 'traite'])->default('non_lu');
        });
    }

    public function down()
    {
        Schema::dropIfExists('messages');
    }
};