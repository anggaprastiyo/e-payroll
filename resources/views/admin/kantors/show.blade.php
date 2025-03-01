@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.kantor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kantors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.kantor.fields.id') }}
                        </th>
                        <td>
                            {{ $kantor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kantor.fields.perusahaan') }}
                        </th>
                        <td>
                            {{ $kantor->perusahaan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kantor.fields.area') }}
                        </th>
                        <td>
                            {{ $kantor->area->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kantor.fields.nama') }}
                        </th>
                        <td>
                            {{ $kantor->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.kantor.fields.alamat') }}
                        </th>
                        <td>
                            {{ $kantor->alamat }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.kantors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection