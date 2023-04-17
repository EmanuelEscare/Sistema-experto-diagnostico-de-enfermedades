<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('padecimientos_sintomas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sintoma_id')
                ->references('id')->on('sintomas')
                ->onDelete('cascade');
            $table->foreignId('padecimiento_id')
                ->references('id')->on('padecimientos')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('padecimientos_sintomas');
    }
};