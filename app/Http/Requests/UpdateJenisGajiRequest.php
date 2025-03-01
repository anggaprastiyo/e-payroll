<?php

namespace App\Http\Requests;

use App\Models\JenisGaji;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJenisGajiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jenis_gaji_edit');
    }

    public function rules()
    {
        return [
            'perusahaan_id' => [
                'required',
                'integer',
            ],
            'kode' => [
                'string',
                'nullable',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
