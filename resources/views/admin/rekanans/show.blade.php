@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.rekanan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rekanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.rekanan.fields.id') }}
                        </th>
                        <td>
                            {{ $rekanan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekanan.fields.perusahaan') }}
                        </th>
                        <td>
                            {{ $rekanan->perusahaan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekanan.fields.area') }}
                        </th>
                        <td>
                            {{ $rekanan->area->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.rekanan.fields.nama') }}
                        </th>
                        <td>
                            {{ $rekanan->nama }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rekanans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection