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
        Schema::create('umkm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('identitas_id');
            $table->string('nomor_surat');
            $table->string('domisili');
            $table->string('nama');
            $table->string('telepon');
            $table->string('alamat');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('nama_usaha');
            $table->string('bidang');
            $table->string('modal');
            $table->string('sarana');
            $table->string('alamat_usaha');
            $table->string('kelurahan_usaha');
            $table->string('kecamatan_usaha');
            $table->string('ttd');
            $table->foreign('identitas_id')->references('id')->on('identitas')->onDelete('cascade');
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
        Schema::dropIfExists('umkm');
    }
};
