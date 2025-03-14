@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.gajiBulanan.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.gaji-bulanans.update", [$gajiBulanan->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('perusahaan') ? 'has-error' : '' }}">
                            <label class="required" for="perusahaan_id">{{ trans('cruds.gajiBulanan.fields.perusahaan') }}</label>
                            <select class="form-control select2" name="perusahaan_id" id="perusahaan_id" required>
                                @foreach($perusahaans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('perusahaan_id') ? old('perusahaan_id') : $gajiBulanan->perusahaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perusahaan'))
                                <span class="help-block" role="alert">{{ $errors->first('perusahaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulanan.fields.perusahaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_gaji') ? 'has-error' : '' }}">
                            <label class="required" for="jenis_gaji_id">{{ trans('cruds.gajiBulanan.fields.jenis_gaji') }}</label>
                            <select class="form-control select2" name="jenis_gaji_id" id="jenis_gaji_id" required>
                                @foreach($jenis_gajis as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('jenis_gaji_id') ? old('jenis_gaji_id') : $gajiBulanan->jenis_gaji->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('jenis_gaji'))
                                <span class="help-block" role="alert">{{ $errors->first('jenis_gaji') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulanan.fields.jenis_gaji_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal">{{ trans('cruds.gajiBulanan.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $gajiBulanan->tanggal) }}" required>
                            @if($errors->has('tanggal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulanan.fields.tanggal_helper') }}</span>
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