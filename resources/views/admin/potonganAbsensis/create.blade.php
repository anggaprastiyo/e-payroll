@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.potonganAbsensi.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.potongan-absensis.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('perusahaan') ? 'has-error' : '' }}">
                            <label class="required" for="perusahaan_id">{{ trans('cruds.potonganAbsensi.fields.perusahaan') }}</label>
                            <select class="form-control select2" name="perusahaan_id" id="perusahaan_id" required>
                                @foreach($perusahaans as $id => $entry)
                                    <option value="{{ $id }}" {{ old('perusahaan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perusahaan'))
                                <span class="help-block" role="alert">{{ $errors->first('perusahaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.perusahaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('terlambat') ? 'has-error' : '' }}">
                            <label class="required" for="terlambat">{{ trans('cruds.potonganAbsensi.fields.terlambat') }}</label>
                            <input class="form-control" type="number" name="terlambat" id="terlambat" value="{{ old('terlambat', '') }}" step="0.01" required>
                            @if($errors->has('terlambat'))
                                <span class="help-block" role="alert">{{ $errors->first('terlambat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.terlambat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pulang_cepat') ? 'has-error' : '' }}">
                            <label for="pulang_cepat">{{ trans('cruds.potonganAbsensi.fields.pulang_cepat') }}</label>
                            <input class="form-control" type="number" name="pulang_cepat" id="pulang_cepat" value="{{ old('pulang_cepat', '') }}" step="0.01">
                            @if($errors->has('pulang_cepat'))
                                <span class="help-block" role="alert">{{ $errors->first('pulang_cepat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.pulang_cepat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('izin') ? 'has-error' : '' }}">
                            <label for="izin">{{ trans('cruds.potonganAbsensi.fields.izin') }}</label>
                            <input class="form-control" type="number" name="izin" id="izin" value="{{ old('izin', '') }}" step="0.01">
                            @if($errors->has('izin'))
                                <span class="help-block" role="alert">{{ $errors->first('izin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.izin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sakit') ? 'has-error' : '' }}">
                            <label for="sakit">{{ trans('cruds.potonganAbsensi.fields.sakit') }}</label>
                            <input class="form-control" type="number" name="sakit" id="sakit" value="{{ old('sakit', '') }}" step="0.01">
                            @if($errors->has('sakit'))
                                <span class="help-block" role="alert">{{ $errors->first('sakit') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.sakit_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanpa_kabar') ? 'has-error' : '' }}">
                            <label for="tanpa_kabar">{{ trans('cruds.potonganAbsensi.fields.tanpa_kabar') }}</label>
                            <input class="form-control" type="number" name="tanpa_kabar" id="tanpa_kabar" value="{{ old('tanpa_kabar', '') }}" step="0.01">
                            @if($errors->has('tanpa_kabar'))
                                <span class="help-block" role="alert">{{ $errors->first('tanpa_kabar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.tanpa_kabar_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection