<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJenisGajisTable extends Migration
{
    public function up()
    {
        Schema::table('jenis_gajis', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->foreign('perusahaan_id', 'perusahaan_fk_10468424')->references('id')->on('perusahaans');
        });
    }
}
