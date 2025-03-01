@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.gajiBulanan.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gaji-bulanans.update", [$gajiBulanan->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="perusahaan_id">{{ trans('cruds.gajiBulanan.fields.perusahaan') }}</label>
                <select class="form-control select2 {{ $errors->has('perusahaan') ? 'is-invalid' : '' }}" name="perusahaan_id" id="perusahaan_id" required>
                    @foreach($perusahaans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('perusahaan_id') ? old('perusahaan_id') : $gajiBulanan->perusahaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('perusahaan'))
                    <span class="text-danger">{{ $errors->first('perusahaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gajiBulanan.fields.perusahaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jenis_gaji_id">{{ trans('cruds.gajiBulanan.fields.jenis_gaji') }}</label>
                <select class="form-control select2 {{ $errors->has('jenis_gaji') ? 'is-invalid' : '' }}" name="jenis_gaji_id" id="jenis_gaji_id" required>
                    @foreach($jenis_gajis as $id => $entry)
                        <option value="{{ $id }}" {{ (old('jenis_gaji_id') ? old('jenis_gaji_id') : $gajiBulanan->jenis_gaji->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('jenis_gaji'))
                    <span class="text-danger">{{ $errors->first('jenis_gaji') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gajiBulanan.fields.jenis_gaji_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.gajiBulanan.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $gajiBulanan->tanggal) }}" required>
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gajiBulanan.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.gajiBulanan.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\GajiBulanan::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $gajiBulanan->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.gajiBulanan.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection