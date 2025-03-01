<?php

namespace App\Http\Requests;

use App\Models\JenisGaji;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJenisGajiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jenis_gaji_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jenis_gajis,id',
        ];
    }
}
