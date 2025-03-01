<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToHariLiburNasionalsTable extends Migration
{
    public function up()
    {
        Schema::table('hari_libur_nasionals', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->foreign('perusahaan_id', 'perusahaan_fk_10467961')->references('id')->on('perusahaans');
        });
    }
}
