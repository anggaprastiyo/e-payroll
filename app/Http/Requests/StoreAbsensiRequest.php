<?php

namespace App\Http\Requests;

use App\Models\Absensi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAbsensiRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('absensi_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jam_datang' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'jam_pulang' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
