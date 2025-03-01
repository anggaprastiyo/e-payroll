<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLembursTable extends Migration
{
    public function up()
    {
        Schema::create('lemburs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_akhir');
            $table->longText('keterangan_pekerjaan');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
