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
        Schema::create('sktm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomer_surat')->nullable();
            $table->string('pembuat')->nullable();
            $table->date('tanggal_pembuatan')->nullable();
            $table->string('nama_pengaju')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->string('ttl')->nullable();
            $table->string('nik')->nullable();
            $table->string('ktp')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('status')->nullable();
            $table->text('alamat')->nullable();
            $table->text('keperluan')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('sktm');
    }
};
