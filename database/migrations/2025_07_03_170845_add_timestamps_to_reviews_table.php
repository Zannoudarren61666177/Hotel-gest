<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ajouter les colonnes timestamps à la table reviews.
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->timestamps(); // Ajoute created_at et updated_at
        });
    }

    /**
     * Supprimer les colonnes timestamps de la table reviews.
     */
    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};