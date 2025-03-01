@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.refBpj.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ref-bpjs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.refBpj.fields.id') }}
                        </th>
                        <td>
                            {{ $refBpj->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refBpj.fields.kode') }}
                        </th>
                        <td>
                            {{ $refBpj->kode }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refBpj.fields.provider') }}
                        </th>
                        <td>
                            {{ App\Models\RefBpj::PROVIDER_RADIO[$refBpj->provider] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refBpj.fields.nama') }}
                        </th>
                        <td>
                            {{ $refBpj->nama }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refBpj.fields.presentase') }}
                        </th>
                        <td>
                            {{ $refBpj->presentase }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.refBpj.fields.jenis_beban') }}
                        </th>
                        <td>
                            {{ App\Models\RefBpj::JENIS_BEBAN_RADIO[$refBpj->jenis_beban] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.ref-bpjs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection