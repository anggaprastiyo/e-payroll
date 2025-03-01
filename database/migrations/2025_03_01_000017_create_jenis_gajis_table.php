<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisGajisTable extends Migration
{
    public function up()
    {
        Schema::create('jenis_gajis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('nama');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
