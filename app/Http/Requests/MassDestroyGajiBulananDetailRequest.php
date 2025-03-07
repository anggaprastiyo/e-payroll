<?php

namespace App\Http\Requests;

use App\Models\GajiBulananDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGajiBulananDetailRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('gaji_bulanan_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:gaji_bulanan_details,id',
        ];
    }
}
