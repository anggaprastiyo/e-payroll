<?php

namespace App\Http\Requests;

use App\Models\Jabatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJabatanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jabatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jabatans,id',
        ];
    }
}
