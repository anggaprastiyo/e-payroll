<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajiBulananDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('gaji_bulanan_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('total_tunjangan', 15, 2);
            $table->decimal('total_iuran_bpjstk', 15, 2);
            $table->decimal('total_iuran_bpjskes', 15, 2);
            $table->decimal('total_lembur', 15, 2);
            $table->decimal('total_pajak', 15, 2);
            $table->decimal('total_premi_bpjstk', 15, 2);
            $table->decimal('total_premi_bpjskes', 15, 2);
            $table->decimal('premi_taspen_save', 15, 2);
            $table->decimal('total_potongan_absensi', 15, 2);
            $table->decimal('total_potongan_pihak_ketiga', 15, 2);
            $table->decimal('total_thp', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
