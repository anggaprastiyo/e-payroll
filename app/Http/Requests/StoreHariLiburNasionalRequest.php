<?php

namespace App\Http\Requests;

use App\Models\HariLiburNasional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHariLiburNasionalRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('hari_libur_nasional_create');
    }

    public function rules()
    {
        return [
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
