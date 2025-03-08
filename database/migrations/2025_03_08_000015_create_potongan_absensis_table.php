<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotonganAbsensisTable extends Migration
{
    public function up()
    {
        Schema::create('potongan_absensis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('terlambat', 5, 2);
            $table->float('pulang_cepat', 5, 2)->nullable();
            $table->float('izin', 5, 2)->nullable();
            $table->float('sakit', 5, 2)->nullable();
            $table->float('tanpa_kabar', 5, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
