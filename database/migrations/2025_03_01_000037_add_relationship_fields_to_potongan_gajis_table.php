<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPotonganGajisTable extends Migration
{
    public function up()
    {
        Schema::table('potongan_gajis', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_10468448')->references('id')->on('users');
            $table->unsignedBigInteger('rekanan_id')->nullable();
            $table->foreign('rekanan_id', 'rekanan_fk_10468449')->references('id')->on('rekanans');
            $table->unsignedBigInteger('periode_gaji_id')->nullable();
            $table->foreign('periode_gaji_id', 'periode_gaji_fk_10468482')->references('id')->on('gaji_bulanans');
        });
    }
}
