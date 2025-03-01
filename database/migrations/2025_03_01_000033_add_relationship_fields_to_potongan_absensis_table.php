<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPotonganAbsensisTable extends Migration
{
    public function up()
    {
        Schema::table('potongan_absensis', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->foreign('perusahaan_id', 'perusahaan_fk_10467951')->references('id')->on('perusahaans');
        });
    }
}
