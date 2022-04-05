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
        Schema::create('identitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik')->nullable();
            $table->string('nkk')->nullable();
            $table->string('nama')->nullable();
            $table->string('ttl')->nullable();
            $table->enum('agama', ['islam', 'kristen', 'hindu', 'budha', 'konghucu', 'lain'])->nullable();
            $table->enum('kelamin', ['laki', 'perempuan'])->nullable();
            $table->enum('status_kawin', ['menikah', 'belum menikah'])->nullable();
            $table->enum('pekerjaan', ['swasta', 'pegawai negeri', 'wirausaha', 'pengusaha', 'tidak bekerja', 'lain'])->nullable();
            $table->string('pendidikan')->nullable();
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
        //
    }
};
