<?php

namespace App\Http\Requests;

use App\Models\Kantor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreKantorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('kantor_create');
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
