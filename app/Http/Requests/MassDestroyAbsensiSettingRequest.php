<?php

namespace App\Http\Requests;

use App\Models\AbsensiSetting;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAbsensiSettingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('absensi_setting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:absensi_settings,id',
        ];
    }
}
