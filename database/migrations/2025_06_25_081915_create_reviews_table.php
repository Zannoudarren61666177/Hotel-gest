<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Création de la table 'reviews' pour stocker les avis des clients et visiteurs
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            // L'utilisateur qui a laissé l'avis (nullable si avis laissé par un visiteur)
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            // Hôtel concerné par l'avis
            $table->foreignId('hotel_id')->constrained('hotels')->cascadeOnDelete();
            // Chambre concernée par l'avis (optionnel)
            $table->foreignId('room_id')->nullable()->constrained('rooms')->nullOnDelete();
            // Nom de l'auteur si non connecté (visiteur)
            $table->string('auteur')->nullable();
            // Commentaire du client/visiteur
            $table->text('commentaire')->nullable();
            // Note sur 5
            $table->unsignedTinyInteger('note');
            // Date de publication de l'avis
            $table->timestamp('date')->useCurrent();
            // Statut de l'avis (publié, masqué, supprimé, en attente de validation)
            $table->enum('statut', ['publie', 'masque', 'supprime', 'en_attente'])->default('publie');
            // Ajoute les colonnes created_at et updated_at
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};