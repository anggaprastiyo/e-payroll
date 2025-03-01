<?php

namespace App\Http\Requests;

use App\Models\AbsensiSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAbsensiSettingRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('absensi_setting_edit');
    }

    public function rules()
    {
        return [
            'hari' => [
                'required',
            ],
            'jam_datang' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'jam_pulang' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
        ];
    }
}
