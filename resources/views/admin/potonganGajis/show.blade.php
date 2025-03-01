@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.potonganGaji.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.potongan-gajis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganGaji.fields.id') }}
                        </th>
                        <td>
                            {{ $potonganGaji->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganGaji.fields.user') }}
                        </th>
                        <td>
                            {{ $potonganGaji->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganGaji.fields.rekanan') }}
                        </th>
                        <td>
                            {{ $potonganGaji->rekanan->nama ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganGaji.fields.periode_gaji') }}
                        </th>
                        <td>
                            {{ $potonganGaji->periode_gaji->tanggal ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganGaji.fields.keterangan') }}
                        </th>
                        <td>
                            {!! $potonganGaji->keterangan !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.potonganGaji.fields.nominal') }}
                        </th>
                        <td>
                            {{ $potonganGaji->nominal }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.potongan-gajis.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection