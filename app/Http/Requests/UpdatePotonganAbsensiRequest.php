<?php

namespace App\Http\Requests;

use App\Models\PotonganAbsensi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePotonganAbsensiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('potongan_absensi_edit');
    }

    public function rules()
    {
        return [
            'perusahaan_id' => [
                'required',
                'integer',
            ],
            'terlambat' => [
                'numeric',
                'required',
            ],
            'pulang_cepat' => [
                'numeric',
            ],
            'izin' => [
                'numeric',
            ],
            'sakit' => [
                'numeric',
            ],
            'tanpa_kabar' => [
                'numeric',
            ],
        ];
    }
}
