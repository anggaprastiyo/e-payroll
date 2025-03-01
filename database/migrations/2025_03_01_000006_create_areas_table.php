<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreasTable extends Migration
{
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->decimal('umr', 15, 2);
            $table->decimal('tunjangan_kemahalan', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
