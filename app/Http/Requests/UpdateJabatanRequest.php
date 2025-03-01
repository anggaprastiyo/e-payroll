<?php

namespace App\Http\Requests;

use App\Models\Jabatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJabatanRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jabatan_edit');
    }

    public function rules()
    {
        return [
            'kantor_id' => [
                'required',
                'integer',
            ],
            'kode' => [
                'string',
                'nullable',
            ],
            'nama' => [
                'string',
                'required',
            ],
            'koefisien_tunjangan' => [
                'numeric',
            ],
            'is_lembur_otomatis' => [
                'required',
            ],
            'tujangan_kinerja' => [
                'required',
            ],
            'tunjangan_komunikasi' => [
                'required',
            ],
            'tunjangan_cuti' => [
                'required',
            ],
            'tunjangan_pakaian' => [
                'required',
            ],
            'tunjangan_jabatan' => [
                'required',
            ],
            'tunjangan_kemahalan' => [
                'required',
            ],
        ];
    }
}
