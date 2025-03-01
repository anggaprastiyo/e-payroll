<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJabatansTable extends Migration
{
    public function up()
    {
        Schema::table('jabatans', function (Blueprint $table) {
            $table->unsignedBigInteger('kantor_id')->nullable();
            $table->foreign('kantor_id', 'kantor_fk_10467873')->references('id')->on('kantors');
        });
    }
}
