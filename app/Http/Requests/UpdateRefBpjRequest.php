<?php

namespace App\Http\Requests;

use App\Models\RefBpj;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRefBpjRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('ref_bpj_edit');
    }

    public function rules()
    {
        return [
            'kode' => [
                'string',
                'nullable',
            ],
            'provider' => [
                'required',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'presentase' => [
                'numeric',
                'required',
            ],
            'jenis_beban' => [
                'required',
            ],
        ];
    }
}
