@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.hariLiburNasional.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.hari-libur-nasionals.update", [$hariLiburNasional->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('perusahaan') ? 'has-error' : '' }}">
                            <label for="perusahaan_id">{{ trans('cruds.hariLiburNasional.fields.perusahaan') }}</label>
                            <select class="form-control select2" name="perusahaan_id" id="perusahaan_id">
                                @foreach($perusahaans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('perusahaan_id') ? old('perusahaan_id') : $hariLiburNasional->perusahaan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('perusahaan'))
                                <span class="help-block" role="alert">{{ $errors->first('perusahaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hariLiburNasional.fields.perusahaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal">{{ trans('cruds.hariLiburNasional.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $hariLiburNasional->tanggal) }}" required>
                            @if($errors->has('tanggal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.hariLiburNasional.fields.tanggal_helper') }}</span>
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