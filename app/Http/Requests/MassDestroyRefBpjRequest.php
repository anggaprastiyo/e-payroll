<?php

namespace App\Http\Requests;

use App\Models\RefBpj;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRefBpjRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('ref_bpj_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:ref_bpjs,id',
        ];
    }
}
