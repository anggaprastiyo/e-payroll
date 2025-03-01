@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.jenisGaji.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jenis-gajis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="perusahaan_id">{{ trans('cruds.jenisGaji.fields.perusahaan') }}</label>
                <select class="form-control select2 {{ $errors->has('perusahaan') ? 'is-invalid' : '' }}" name="perusahaan_id" id="perusahaan_id" required>
                    @foreach($perusahaans as $id => $entry)
                        <option value="{{ $id }}" {{ old('perusahaan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('perusahaan'))
                    <span class="text-danger">{{ $errors->first('perusahaan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jenisGaji.fields.perusahaan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="kode">{{ trans('cruds.jenisGaji.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', '') }}">
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jenisGaji.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.jenisGaji.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.jenisGaji.fields.nama_helper') }}</span>
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