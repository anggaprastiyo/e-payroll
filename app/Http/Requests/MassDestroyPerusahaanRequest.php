<?php

namespace App\Http\Requests;

use App\Models\Perusahaan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPerusahaanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('perusahaan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:perusahaans,id',
        ];
    }
}
