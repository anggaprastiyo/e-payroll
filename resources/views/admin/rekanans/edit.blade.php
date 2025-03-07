@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.rekanan.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.rekanans.update", [$rekanan->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('perusahaan') ? 'has-error' : '' }}">
                            <label class="required" for="perusahaan_id">{{ trans('cruds.rekanan.fields.perusahaan') }}</label>
                            <select class="form-control select2" name="perusahaan_id" id="perusahaan_id" required>
                                @foreach($perusahaans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('perusahaan_id') ? old('perusahaan_id') : $rekanan->perusahaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perusahaan'))
                                <span class="help-block" role="alert">{{ $errors->first('perusahaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rekanan.fields.perusahaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('area') ? 'has-error' : '' }}">
                            <label class="required" for="area_id">{{ trans('cruds.rekanan.fields.area') }}</label>
                            <select class="form-control select2" name="area_id" id="area_id" required>
                                @foreach($areas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('area_id') ? old('area_id') : $rekanan->area->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('area'))
                                <span class="help-block" role="alert">{{ $errors->first('area') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rekanan.fields.area_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.rekanan.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $rekanan->nama) }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.rekanan.fields.nama_helper') }}</span>
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