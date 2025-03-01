<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users,email,' . request()->route('user')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'jenis_pegawai' => [
                'required',
            ],
            'jenis_kelamin' => [
                'required',
            ],
            'tempat_lahir' => [
                'string',
                'nullable',
            ],
            'no_ktp' => [
                'string',
                'required',
            ],
            'no_kk' => [
                'string',
                'required',
            ],
            'tmt_masuk' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'no_bpjstk' => [
                'string',
                'nullable',
            ],
            'no_bpjskes' => [
                'string',
                'required',
            ],
            'no_rekening' => [
                'string',
                'nullable',
            ],
        ];
    }
}
