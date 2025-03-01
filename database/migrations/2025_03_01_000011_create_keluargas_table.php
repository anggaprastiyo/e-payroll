<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluargasTable extends Migration
{
    public function up()
    {
        Schema::create('keluargas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('hubungan_keluarga');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('no_ktp')->nullable();
            $table->string('no_kk');
            $table->string('no_bpjskes')->nullable();
            $table->longText('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
