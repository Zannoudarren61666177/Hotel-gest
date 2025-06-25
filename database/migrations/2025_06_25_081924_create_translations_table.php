<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->string('table_name', 50);
            $table->unsignedBigInteger('row_id');
            $table->string('field', 50);
            $table->string('language', 5);
            $table->text('value')->nullable();
            $table->index(['table_name', 'row_id', 'field', 'language'], 'idx_translations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('translations');
    }
};