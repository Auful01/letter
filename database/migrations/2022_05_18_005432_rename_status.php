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
        Schema::table('skn', function (Blueprint $table) {
            $table->renameColumn('status_kawin', 'status_kawin_pasangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skn', function (Blueprint $table) {
            $table->renameColumn('status_kawin_pasangan', 'status_kawin');
        });
    }
};
