<?php

namespace App\Http\Requests;

use App\Models\Perusahaan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePerusahaanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('perusahaan_edit');
    }

    public function rules()
    {
        return [
            'area_id' => [
                'required',
                'integer',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'alamat' => [
                'string',
                'nullable',
            ],
        ];
    }
}
