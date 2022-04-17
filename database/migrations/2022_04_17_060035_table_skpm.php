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
        Schema::create('skpm', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('identitas_id');
            $table->string('nomor_surat');
            $table->string('sk_rtrw');
            $table->string('perlu');
            $table->date('berlaku_dari');
            $table->date('berlaku_sampai');
            $table->text('alamat_asal');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');
            $table->string('tgl_pindah');
            $table->string('alamat_pindah');
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
