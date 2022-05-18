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
        Schema::create('skn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('identitas_id');
            $table->string('nomor_surat')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('ttl')->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('bin')->nullable();
            $table->string('nik_pasangan')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('kelamin_pasangan')->nullable();
            $table->string('ttl_pasangan')->nullable();
            $table->string('agama_pasangan')->nullable();
            $table->string('pekerjaan_pasangan')->nullable();
            $table->string('alamat_pasangan')->nullable();
            $table->string('desa_pasangan')->nullable();
            $table->string('kecamatan_pasangan')->nullable();
            $table->string('kabupaten_pasangan')->nullable();
            $table->string('bin_pasangan')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('pasangan_sebelum')->nullable();
            $table->string('ttd')->nullable();
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
        Schema::dropIfExists('skn');
    }
};
