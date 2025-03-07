@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.gajiBulananDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.gaji-bulanan-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.gaji_bulanan') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->gaji_bulanan->tanggal ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->user->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.gaji_pokok') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->gaji_pokok }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_tunjangan') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_tunjangan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjstk') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_iuran_bpjstk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjskes') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_iuran_bpjskes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_lembur') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_lembur }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_pajak') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_pajak }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjstk') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_premi_bpjstk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjskes') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_premi_bpjskes }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.premi_taspen_save') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->premi_taspen_save }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_potongan_absensi') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_potongan_absensi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_potongan_pihak_ketiga') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_potongan_pihak_ketiga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.gajiBulananDetail.fields.total_thp') }}
                                    </th>
                                    <td>
                                        {{ $gajiBulananDetail->total_thp }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.gaji-bulanan-details.index') }}">
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