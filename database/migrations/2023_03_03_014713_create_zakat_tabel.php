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
        Schema::create('zakat_tabel', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->nullable();
            $table->string('tipe_zakat')->nullable();
            $table->string('nama_donatur')->nullable();
            $table->string('jml_donasi')->nullable();
            $table->string('terkumpul')->nullable();
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
        Schema::dropIfExists('zakat_tabel');
    }
};
