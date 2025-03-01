<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'jabatans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const IS_LEMBUR_OTOMATIS_RADIO = [
        '1' => 'Ya',
        '0' => 'Tidak',
    ];

    protected $fillable = [
        'kantor_id',
        'kode',
        'nama',
        'koefisien_tunjangan',
        'is_lembur_otomatis',
        'tujangan_kinerja',
        'tunjangan_komunikasi',
        'tunjangan_cuti',
        'tunjangan_pakaian',
        'tunjangan_jabatan',
        'tunjangan_kemahalan',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function kantor()
    {
        return $this->belongsTo(Kantor::class, 'kantor_id');
    }
}
