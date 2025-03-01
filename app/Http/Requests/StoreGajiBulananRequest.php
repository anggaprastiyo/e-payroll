<?php

namespace App\Http\Requests;

use App\Models\GajiBulanan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreGajiBulananRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gaji_bulanan_create');
    }

    public function rules()
    {
        return [
            'perusahaan_id' => [
                'required',
                'integer',
            ],
            'jenis_gaji_id' => [
                'required',
                'integer',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
