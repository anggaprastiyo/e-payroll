@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.gajiBulanan.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.gaji-bulanans.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulanan.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulanan->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulanan.fields.perusahaan') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulanan->perusahaan->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulanan.fields.jenis_gaji') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulanan->jenis_gaji->nama ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulanan.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulanan->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulanan.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\GajiBulanan::STATUS_SELECT[$gajiBulanan->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.gaji-bulanans.index') }}">
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