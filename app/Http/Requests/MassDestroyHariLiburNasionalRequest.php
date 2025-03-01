<?php

namespace App\Http\Requests;

use App\Models\HariLiburNasional;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyHariLiburNasionalRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('hari_libur_nasional_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:hari_libur_nasionals,id',
        ];
    }
}
