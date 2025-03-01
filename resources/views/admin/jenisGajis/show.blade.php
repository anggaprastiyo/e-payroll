@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jenisGaji.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jenis-gajis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisGaji.fields.id') }}
                        </th>
                        <td>
                            {{ $jenisGaji->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisGaji.fields.perusahaan') }}
                        </th>
                        <td>
                            {{ $jenisGaji->perusahaan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisGaji.fields.kode') }}
                        </th>
                        <td>
                            {{ $jenisGaji->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jenisGaji.fields.nama') }}
                        </th>
                        <td>
                            {{ $jenisGaji->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jenis-gajis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection