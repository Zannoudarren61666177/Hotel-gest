<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            if (!Schema::hasColumn('hotels', 'nom')) {
                $table->string('nom')->after('id');
            }
            if (!Schema::hasColumn('hotels', 'adresse')) {
                $table->string('adresse')->after('nom');
            }
            if (!Schema::hasColumn('hotels', 'ville')) {
                $table->string('ville')->after('adresse');
            }
            if (!Schema::hasColumn('hotels', 'pays')) {
                $table->string('pays')->after('ville');
            }
            if (!Schema::hasColumn('hotels', 'telephone')) {
                $table->string('telephone')->nullable()->after('pays');
            }
            if (!Schema::hasColumn('hotels', 'email')) {
                $table->string('email')->nullable()->after('telephone');
            }
            if (!Schema::hasColumn('hotels', 'description')) {
                $table->text('description')->nullable()->after('email');
            }
            if (!Schema::hasColumn('hotels', 'image_url')) {
                $table->string('image_url')->nullable()->after('description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {
            $colonnes = [
                'nom',
                'adresse',
                'ville',
                'pays',
                'telephone',
                'email',
                'description',
                'image_url'
            ];
            foreach ($colonnes as $colonne) {
                if (Schema::hasColumn('hotels', $colonne)) {
                    $table->dropColumn($colonne);
                }
            }
        });
    }
};