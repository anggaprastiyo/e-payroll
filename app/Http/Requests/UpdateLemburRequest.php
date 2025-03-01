<?php

namespace App\Http\Requests;

use App\Models\Lembur;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateLemburRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('lembur_edit');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'tanggal' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'jam_mulai' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'jam_akhir' => [
                'required',
                'date_format:' . config('panel.time_format'),
            ],
            'keterangan_pekerjaan' => [
                'required',
            ],
            'status' => [
                'required',
            ],
        ];
    }
}
