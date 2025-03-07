<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPerusahaansTable extends Migration
{
    public function up()
    {
        Schema::table('perusahaans', function (Blueprint $table) {
            $table->unsignedBigInteger('area_id')->nullable();
            $table->foreign('area_id', 'area_fk_10467775')->references('id')->on('areas');
        });
    }
}
