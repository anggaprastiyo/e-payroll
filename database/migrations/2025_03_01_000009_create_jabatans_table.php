<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJabatansTable extends Migration
{
    public function up()
    {
        Schema::create('jabatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode')->nullable();
            $table->string('nama');
            $table->float('koefisien_tunjangan', 5, 2)->nullable();
            $table->string('is_lembur_otomatis');
            $table->decimal('tujangan_kinerja', 15, 2);
            $table->decimal('tunjangan_komunikasi', 15, 2);
            $table->decimal('tunjangan_cuti', 15, 2);
            $table->decimal('tunjangan_pakaian', 15, 2);
            $table->decimal('tunjangan_jabatan', 15, 2);
            $table->decimal('tunjangan_kemahalan', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
