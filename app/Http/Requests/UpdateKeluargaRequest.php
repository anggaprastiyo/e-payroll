<?php

namespace App\Http\Requests;

use App\Models\Keluarga;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateKeluargaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('keluarga_edit');
    }

    public function rules()
    {
        return [
            'nama' => [
                'string',
                'required',
            ],
            'hubungan_keluarga' => [
                'required',
            ],
            'jenis_kelamin' => [
                'required',
            ],
            'tempat_lahir' => [
                'string',
                'required',
            ],
            'tanggal_lahir' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'agama' => [
                'required',
            ],
            'no_ktp' => [
                'string',
                'nullable',
            ],
            'no_kk' => [
                'string',
                'required',
            ],
            'no_bpjskes' => [
                'string',
                'nullable',
            ],
        ];
    }
}
