@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.absensiSetting.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.absensi-settings.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $absensiSetting->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.kantor') }}
                                    </th>
                                    <td>
                                        {{ $absensiSetting->kantor->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.hari') }}
                                    </th>
                                    <td>
                                        {{ App\Models\AbsensiSetting::HARI_SELECT[$absensiSetting->hari] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.jam_datang') }}
                                    </th>
                                    <td>
                                        {{ $absensiSetting->jam_datang }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.absensiSetting.fields.jam_pulang') }}
                                    </th>
                                    <td>
                                        {{ $absensiSetting->jam_pulang }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.absensi-settings.index') }}">
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