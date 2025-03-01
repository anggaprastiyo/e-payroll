<?php

namespace App\Http\Requests;

use App\Models\Rekanan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRekananRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('rekanan_edit');
    }

    public function rules()
    {
        return [
            'perusahaan_id' => [
                'required',
                'integer',
            ],
            'area_id' => [
                'required',
                'integer',
            ],
            'nama' => [
                'string',
                'required',
            ],
        ];
    }
}
