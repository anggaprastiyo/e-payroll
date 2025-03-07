@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.lembur.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.lemburs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lembur.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $lembur->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lembur.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $lembur->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lembur.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $lembur->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lembur.fields.jam_mulai') }}
                                    </th>
                                    <td>
                                        {{ $lembur->jam_mulai }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lembur.fields.jam_akhir') }}
                                    </th>
                                    <td>
                                        {{ $lembur->jam_akhir }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lembur.fields.keterangan_pekerjaan') }}
                                    </th>
                                    <td>
                                        {!! $lembur->keterangan_pekerjaan !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.lembur.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Lembur::STATUS_SELECT[$lembur->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.lemburs.index') }}">
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