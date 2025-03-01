@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.potonganAbsensi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.potongan-absensis.update", [$potonganAbsensi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="perusahaan_id">{{ trans('cruds.potonganAbsensi.fields.perusahaan') }}</label>
                <select class="form-control select2 {{ $errors->has('perusahaan') ? 'is-invalid' : '' }}" name="perusahaan_id" id="perusahaan_id" required>
                    @foreach($perusahaans as $id => $entry)
                        <option value="{{ $id }}" {{ (old('perusahaan_id') ? old('perusahaan_id') : $potonganAbsensi->perusahaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('perusahaan'))
                    <span class="text-danger">{{ $errors->first('perusahaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.perusahaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="terlambat">{{ trans('cruds.potonganAbsensi.fields.terlambat') }}</label>
                <input class="form-control {{ $errors->has('terlambat') ? 'is-invalid' : '' }}" type="number" name="terlambat" id="terlambat" value="{{ old('terlambat', $potonganAbsensi->terlambat) }}" step="0.01" required>
                @if($errors->has('terlambat'))
                    <span class="text-danger">{{ $errors->first('terlambat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.terlambat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pulang_cepat">{{ trans('cruds.potonganAbsensi.fields.pulang_cepat') }}</label>
                <input class="form-control {{ $errors->has('pulang_cepat') ? 'is-invalid' : '' }}" type="number" name="pulang_cepat" id="pulang_cepat" value="{{ old('pulang_cepat', $potonganAbsensi->pulang_cepat) }}" step="0.01">
                @if($errors->has('pulang_cepat'))
                    <span class="text-danger">{{ $errors->first('pulang_cepat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.pulang_cepat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="izin">{{ trans('cruds.potonganAbsensi.fields.izin') }}</label>
                <input class="form-control {{ $errors->has('izin') ? 'is-invalid' : '' }}" type="number" name="izin" id="izin" value="{{ old('izin', $potonganAbsensi->izin) }}" step="0.01">
                @if($errors->has('izin'))
                    <span class="text-danger">{{ $errors->first('izin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.izin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sakit">{{ trans('cruds.potonganAbsensi.fields.sakit') }}</label>
                <input class="form-control {{ $errors->has('sakit') ? 'is-invalid' : '' }}" type="number" name="sakit" id="sakit" value="{{ old('sakit', $potonganAbsensi->sakit) }}" step="0.01">
                @if($errors->has('sakit'))
                    <span class="text-danger">{{ $errors->first('sakit') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.potonganAbsensi.fields.sakit_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanpa_kabar">{{ trans('cruds.potonganAbsensi.fields.tanpa_kabar') }}</label>
                <input class="form-control {{ $errors->has('tanpa_kabar') ? 'is-invalid' : '' }}" type="number" name="tanpa_kabar" id="tanpa_kabar" value="{{ old('tanpa_kabar', $potonganAbsensi->tanpa_kabar) }}" step="0.01">
                @if($errors->has('tanpa_kabar'))
                    <span class="text-danger">{{ $errors->first('tanpa_kabar') }}</span>
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



@endsection