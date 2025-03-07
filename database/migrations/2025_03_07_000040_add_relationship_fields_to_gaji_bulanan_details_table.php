<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGajiBulananDetailsTable extends Migration
{
    public function up()
    {
        Schema::table('gaji_bulanan_details', function (Blueprint $table) {
            $table->unsignedBigInteger('gaji_bulanan_id')->nullable();
            $table->foreign('gaji_bulanan_id', 'gaji_bulanan_fk_10480039')->references('id')->on('gaji_bulanans');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10480040')->references('id')->on('users');
        });
    }
}
