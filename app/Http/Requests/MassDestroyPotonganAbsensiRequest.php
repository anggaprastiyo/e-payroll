<?php

namespace App\Http\Requests;

use App\Models\PotonganAbsensi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPotonganAbsensiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('potongan_absensi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:potongan_absensis,id',
        ];
    }
}
