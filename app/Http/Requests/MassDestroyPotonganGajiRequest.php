<?php

namespace App\Http\Requests;

use App\Models\PotonganGaji;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPotonganGajiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('potongan_gaji_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:potongan_gajis,id',
        ];
    }
}
