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
        Schema::create('spm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('identitas_id');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('nomor_surat');
            $table->string('nama_mati');
            $table->date('tgl_mati');
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
        Schema::dropIfExists('spm');
    }
};
