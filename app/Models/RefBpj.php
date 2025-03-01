<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefBpj extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'ref_bpjs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const JENIS_BEBAN_RADIO = [
        'pemberi_kerja' => 'Pemberi Kerja',
        'pegawai'       => 'Pegawai',
    ];

    public const PROVIDER_RADIO = [
        'bpjs_tk'  => 'BPJS Ketenagakerjaan',
        'bpjs_kes' => 'BPJS Kesehatan',
    ];

    protected $fillable = [
        'kode',
        'provider',
        'nama',
        'presentase',
        'jenis_beban',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
