<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRekanansTable extends Migration
{
    public function up()
    {
        Schema::table('rekanans', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->foreign('perusahaan_id', 'perusahaan_fk_10468440')->references('id')->on('perusahaans');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_10468441')->references('id')->on('areas');
        });
    }
}
