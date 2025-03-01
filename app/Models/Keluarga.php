<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Keluarga extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'keluargas';

    public const JENIS_KELAMIN_RADIO = [
        '1' => 'Laki-laki',
        '2' => 'Perempuan',
    ];

    protected $dates = [
        'tanggal_lahir',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const HUBUNGAN_KELUARGA_SELECT = [
        'istri' => 'Istri',
        'suami' => 'Suami',
        'anak'  => 'Anak',
    ];

    public const AGAMA_SELECT = [
        'islam'    => 'Islam',
        'kristen'  => 'Kristen',
        'katolik'  => 'Katolik',
        'buddha'   => 'Buddha',
        'hindu'    => 'Hindu',
        'konghucu' => 'Konghucu',
    ];

    protected $fillable = [
        'user_id',
        'nama',
        'hubungan_keluarga',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'no_ktp',
        'no_kk',
        'no_bpjskes',
        'alamat',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTanggalLahirAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTanggalLahirAttribute($value)
    {
        $this->attributes['tanggal_lahir'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
