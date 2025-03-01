<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToKantorsTable extends Migration
{
    public function up()
    {
        Schema::table('kantors', function (Blueprint $table) {
            $table->unsignedBigInteger('perusahaan_id')->nullable();
            $table->foreign('perusahaan_id', 'perusahaan_fk_10467844')->references('id')->on('perusahaans');
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_10467845')->references('id')->on('areas');
        });
    }
}
