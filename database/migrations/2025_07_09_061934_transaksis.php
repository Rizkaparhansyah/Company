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
         Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('id_campign')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_donatur')->nullable();
            $table->string('tipe_zakat')->nullable();
            $table->integer('nominal')->nullable();
            $table->string('status')->nullable();
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
         Schema::dropIfExists('transaksis');
    }
};
