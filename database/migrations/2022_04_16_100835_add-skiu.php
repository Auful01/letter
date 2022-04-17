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
        Schema::create('skiu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('identitas_id');
            $table->string('nomor_surat');
            $table->string('tujuan');
            $table->string('perlu');
            $table->string('sk_rtrw');
            $table->date('berlaku_mulai');
            $table->date('berlaku_sampai');
            $table->string('nama_usaha');
            $table->text('alamat_usaha');
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
