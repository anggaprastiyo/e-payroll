@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.area.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.areas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.area.fields.id') }}
                        </th>
                        <td>
                            {{ $area->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.area.fields.nama') }}
                        </th>
                        <td>
                            {{ $area->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.area.fields.umr') }}
                        </th>
                        <td>
                            {{ $area->umr }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.area.fields.tunjangan_kemahalan') }}
                        </th>
                        <td>
                            {{ $area->tunjangan_kemahalan }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.areas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#area_perusahaans" role="tab" data-toggle="tab">
                {{ trans('cruds.perusahaan.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="area_perusahaans">
            @includeIf('admin.areas.relationships.areaPerusahaans', ['perusahaans' => $area->areaPerusahaans])
        </div>
    </div>
</div>

@endsection