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
        Schema::create('skpn', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('identitas_id');
            $table->string('nomor_surat');
            $table->string('alamat_tujuan');
            $table->string('perlu');
            $table->string('sk_rtrw');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('tgl_nikah');
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
