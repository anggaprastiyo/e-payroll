@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.perusahaan.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.perusahaans.update", [$perusahaan->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                            <label class="required" for="area_id">{{ trans('cruds.perusahaan.fields.area') }}</label>
                            <select class="form-control select2" name="area_id" id="area_id" required>
                                @foreach($areas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('area_id') ? old('area_id') : $perusahaan->area->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area'))
                                <span class="help-block" role="alert">{{ $errors->first('area') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.perusahaan.fields.area_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.perusahaan.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $perusahaan->nama) }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.perusahaan.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label for="alamat">{{ trans('cruds.perusahaan.fields.alamat') }}</label>
                            <input class="form-control" type="text" name="alamat" id="alamat" value="{{ old('alamat', $perusahaan->alamat) }}">
                            @if($errors->has('alamat'))
                                <span class="help-block" role="alert">{{ $errors->first('alamat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.perusahaan.fields.alamat_helper') }}</span>
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