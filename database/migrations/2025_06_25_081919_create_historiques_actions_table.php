<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('historiques_actions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('action');
            $table->timestamp('date')->useCurrent();
            $table->text('details')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historiques_actions');
    }
};