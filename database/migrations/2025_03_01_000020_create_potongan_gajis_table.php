<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePotonganGajisTable extends Migration
{
    public function up()
    {
        Schema::create('potongan_gajis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('keterangan');
            $table->decimal('nominal', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
