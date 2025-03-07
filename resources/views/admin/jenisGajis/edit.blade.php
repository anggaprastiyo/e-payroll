@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.jenisGaji.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.jenis-gajis.update", [$jenisGaji->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('perusahaan') ? 'has-error' : '' }}">
                            <label class="required" for="perusahaan_id">{{ trans('cruds.jenisGaji.fields.perusahaan') }}</label>
                            <select class="form-control select2" name="perusahaan_id" id="perusahaan_id" required>
                                @foreach($perusahaans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('perusahaan_id') ? old('perusahaan_id') : $jenisGaji->perusahaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perusahaan'))
                                <span class="help-block" role="alert">{{ $errors->first('perusahaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jenisGaji.fields.perusahaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}">
                            <label for="kode">{{ trans('cruds.jenisGaji.fields.kode') }}</label>
                            <input class="form-control" type="text" name="kode" id="kode" value="{{ old('kode', $jenisGaji->kode) }}">
                            @if($errors->has('kode'))
                                <span class="help-block" role="alert">{{ $errors->first('kode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jenisGaji.fields.kode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.jenisGaji.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $jenisGaji->nama) }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
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



        </div>
    </div>
</div>
@endsection