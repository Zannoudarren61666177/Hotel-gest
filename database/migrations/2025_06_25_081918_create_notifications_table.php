<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('titre');
            $table->text('contenu');
            $table->enum('type', ['confirmation', 'promotion', 'rappel', 'alerte']);
            $table->boolean('lu')->default(false);
            $table->timestamp('date')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};