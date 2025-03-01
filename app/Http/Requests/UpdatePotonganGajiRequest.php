<?php

namespace App\Http\Requests;

use App\Models\PotonganGaji;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePotonganGajiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('potongan_gaji_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'rekanan_id' => [
                'required',
                'integer',
            ],
            'periode_gaji_id' => [
                'required',
                'integer',
            ],
            'keterangan' => [
                'required',
            ],
            'nominal' => [
                'required',
            ],
        ];
    }
}
