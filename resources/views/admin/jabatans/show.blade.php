@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jabatan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jabatans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.id') }}
                        </th>
                        <td>
                            {{ $jabatan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.kantor') }}
                        </th>
                        <td>
                            {{ $jabatan->kantor->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.kode') }}
                        </th>
                        <td>
                            {{ $jabatan->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.nama') }}
                        </th>
                        <td>
                            {{ $jabatan->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.koefisien_tunjangan') }}
                        </th>
                        <td>
                            {{ $jabatan->koefisien_tunjangan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.is_lembur_otomatis') }}
                        </th>
                        <td>
                            {{ App\Models\Jabatan::IS_LEMBUR_OTOMATIS_RADIO[$jabatan->is_lembur_otomatis] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.tujangan_kinerja') }}
                        </th>
                        <td>
                            {{ $jabatan->tujangan_kinerja }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.tunjangan_komunikasi') }}
                        </th>
                        <td>
                            {{ $jabatan->tunjangan_komunikasi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.tunjangan_cuti') }}
                        </th>
                        <td>
                            {{ $jabatan->tunjangan_cuti }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.tunjangan_pakaian') }}
                        </th>
                        <td>
                            {{ $jabatan->tunjangan_pakaian }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.tunjangan_jabatan') }}
                        </th>
                        <td>
                            {{ $jabatan->tunjangan_jabatan }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jabatan.fields.tunjangan_kemahalan') }}
                        </th>
                        <td>
                            {{ $jabatan->tunjangan_kemahalan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jabatans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection