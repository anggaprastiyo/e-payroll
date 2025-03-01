@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.potonganAbsensi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.potongan-absensis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganAbsensi.fields.id') }}
                        </th>
                        <td>
                            {{ $potonganAbsensi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganAbsensi.fields.perusahaan') }}
                        </th>
                        <td>
                            {{ $potonganAbsensi->perusahaan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganAbsensi.fields.terlambat') }}
                        </th>
                        <td>
                            {{ $potonganAbsensi->terlambat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganAbsensi.fields.pulang_cepat') }}
                        </th>
                        <td>
                            {{ $potonganAbsensi->pulang_cepat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganAbsensi.fields.izin') }}
                        </th>
                        <td>
                            {{ $potonganAbsensi->izin }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganAbsensi.fields.sakit') }}
                        </th>
                        <td>
                            {{ $potonganAbsensi->sakit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganAbsensi.fields.tanpa_kabar') }}
                        </th>
                        <td>
                            {{ $potonganAbsensi->tanpa_kabar }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.potongan-absensis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection