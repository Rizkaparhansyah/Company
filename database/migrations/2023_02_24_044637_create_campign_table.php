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
        Schema::create('campign', function (Blueprint $table) {
            $table->id();
            $table->string('target_unix')->nullable();
            $table->string('waktu_mulai_donasi')->nullable();
            $table->string('target_waktu')->nullable();
            $table->string('image')->nullable();
            $table->string('keluhan')->nullable();
            $table->string('perusahaan')->nullable();
            $table->string('target_uang')->nullable();
            $table->string('terkumpul')->nullable();
            $table->string('sisa_waktu')->nullable();
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
        Schema::dropIfExists('campign');
    }
};
