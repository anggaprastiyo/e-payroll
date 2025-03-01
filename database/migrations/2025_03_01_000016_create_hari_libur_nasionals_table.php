<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHariLiburNasionalsTable extends Migration
{
    public function up()
    {
        Schema::create('hari_libur_nasionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tanggal');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
