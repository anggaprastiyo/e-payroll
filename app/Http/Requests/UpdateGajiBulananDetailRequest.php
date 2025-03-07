<?php

namespace App\Http\Requests;

use App\Models\GajiBulananDetail;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGajiBulananDetailRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('gaji_bulanan_detail_edit');
    }

    public function rules()
    {
        return [
            'gaji_bulanan_id' => [
                'required',
                'integer',
            ],
            'user_id' => [
                'required',
                'integer',
            ],
            'gaji_pokok' => [
                'required',
            ],
            'total_tunjangan' => [
                'required',
            ],
            'total_iuran_bpjstk' => [
                'required',
            ],
            'total_iuran_bpjskes' => [
                'required',
            ],
            'total_lembur' => [
                'required',
            ],
            'total_pajak' => [
                'required',
            ],
            'total_premi_bpjstk' => [
                'required',
            ],
            'total_premi_bpjskes' => [
                'required',
            ],
            'premi_taspen_save' => [
                'required',
            ],
            'total_potongan_absensi' => [
                'required',
            ],
            'total_potongan_pihak_ketiga' => [
                'required',
            ],
            'total_thp' => [
                'required',
            ],
        ];
    }
}
