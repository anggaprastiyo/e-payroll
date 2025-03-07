@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.absensi.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.absensis.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensi.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $absensi->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensi.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $absensi->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensi.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $absensi->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensi.fields.jam_datang') }}
                                    </th>
                                    <td>
                                        {{ $absensi->jam_datang }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensi.fields.jam_pulang') }}
                                    </th>
                                    <td>
                                        {{ $absensi->jam_pulang }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensi.fields.keterangan') }}
                                    </th>
                                    <td>
                                        {!! $absensi->keterangan !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensi.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Absensi::STATUS_RADIO[$absensi->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.absensis.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection