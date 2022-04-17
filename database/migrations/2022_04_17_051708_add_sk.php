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
        Schema::create('sk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('identitas_id');
            $table->string('nomor_surat')->nullable();
            $table->string('alamat')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('uraian')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('nama_kuasa')->nullable();
            $table->string('ttl_kuasa')->nullable();
            $table->string('kelamin_kuasa')->nullable();
            $table->string('domisili_kuasa')->nullable();
            $table->string('pekerjaan_kuasa')->nullable();
            $table->string('alamat_kuasa')->nullable();
            $table->string('desa_kuasa')->nullable();
            $table->string('kecamatan_kuasa')->nullable();
            $table->string('kabupaten_kuasa')->nullable();
            $table->string('provinsi_kuasa')->nullable();
            $table->string('ttd');
            $table->timestamps();
            $table->foreign('identitas_id')->references('id')->on('identitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
