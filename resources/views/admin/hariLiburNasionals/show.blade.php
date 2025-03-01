@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.hariLiburNasional.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hari-libur-nasionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.hariLiburNasional.fields.id') }}
                        </th>
                        <td>
                            {{ $hariLiburNasional->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hariLiburNasional.fields.perusahaan') }}
                        </th>
                        <td>
                            {{ $hariLiburNasional->perusahaan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.hariLiburNasional.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $hariLiburNasional->tanggal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.hari-libur-nasionals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection