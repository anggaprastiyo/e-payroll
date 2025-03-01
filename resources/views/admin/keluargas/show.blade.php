@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.keluarga.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keluargas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.id') }}
                        </th>
                        <td>
                            {{ $keluarga->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.user') }}
                        </th>
                        <td>
                            {{ $keluarga->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.nama') }}
                        </th>
                        <td>
                            {{ $keluarga->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.hubungan_keluarga') }}
                        </th>
                        <td>
                            {{ App\Models\Keluarga::HUBUNGAN_KELUARGA_SELECT[$keluarga->hubungan_keluarga] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.jenis_kelamin') }}
                        </th>
                        <td>
                            {{ App\Models\Keluarga::JENIS_KELAMIN_RADIO[$keluarga->jenis_kelamin] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.tempat_lahir') }}
                        </th>
                        <td>
                            {{ $keluarga->tempat_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.tanggal_lahir') }}
                        </th>
                        <td>
                            {{ $keluarga->tanggal_lahir }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.agama') }}
                        </th>
                        <td>
                            {{ App\Models\Keluarga::AGAMA_SELECT[$keluarga->agama] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.no_ktp') }}
                        </th>
                        <td>
                            {{ $keluarga->no_ktp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.no_kk') }}
                        </th>
                        <td>
                            {{ $keluarga->no_kk }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.no_bpjskes') }}
                        </th>
                        <td>
                            {{ $keluarga->no_bpjskes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.keluarga.fields.alamat') }}
                        </th>
                        <td>
                            {{ $keluarga->alamat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.keluargas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection