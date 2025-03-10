<?php

namespace App\Http\Requests;

use App\Models\Bank;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBankRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bank_create');
    }

    public function rules()
    {
        return [
            'area_id' => [
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
