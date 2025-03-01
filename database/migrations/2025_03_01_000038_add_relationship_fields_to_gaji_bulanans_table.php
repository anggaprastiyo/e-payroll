<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGajiBulanansTable extends Migration
{
    public function up()
    {
        Schema::table('gaji_bulanans', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->foreign('perusahaan_id', 'perusahaan_fk_10468475')->references('id')->on('perusahaans');
            $table->unsignedBigInteger('jenis_gaji_id')->nullable();
            $table->foreign('jenis_gaji_id', 'jenis_gaji_fk_10468476')->references('id')->on('jenis_gajis');
        });
    }
}
