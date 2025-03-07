<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GajiBulananDetail extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'gaji_bulanan_details';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'gaji_bulanan_id',
        'user_id',
        'gaji_pokok',
        'total_tunjangan',
        'total_iuran_bpjstk',
        'total_iuran_bpjskes',
        'total_lembur',
        'total_pajak',
        'total_premi_bpjstk',
        'total_premi_bpjskes',
        'premi_taspen_save',
        'total_potongan_absensi',
        'total_potongan_pihak_ketiga',
        'total_thp',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function gaji_bulanan()
    {
        return $this->belongsTo(GajiBulanan::class, 'gaji_bulanan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
