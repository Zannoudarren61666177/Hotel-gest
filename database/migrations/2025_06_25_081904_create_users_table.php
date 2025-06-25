<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('email')->unique();
            $table->string('telephone', 50)->nullable();
            $table->string('mot_de_passe');
            $table->enum('role', ['client', 'admin_hotel', 'admin_systeme'])->default('client');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels')->nullOnDelete();
            $table->enum('statut', ['actif', 'suspendu', 'supprime'])->default('actif');
            $table->timestamp('date_inscription')->useCurrent();
            $table->timestamp('derniere_connexion')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};