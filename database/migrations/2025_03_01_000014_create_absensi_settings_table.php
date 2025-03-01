<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('absensi_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hari');
            $table->time('jam_datang');
            $table->time('jam_pulang');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
