@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.area.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.areas.update", [$area->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.area.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $area->nama) }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.area.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('umr') ? 'has-error' : '' }}">
                            <label class="required" for="umr">{{ trans('cruds.area.fields.umr') }}</label>
                            <input class="form-control" type="number" name="umr" id="umr" value="{{ old('umr', $area->umr) }}" step="0.01" required>
                            @if($errors->has('umr'))
                                <span class="help-block" role="alert">{{ $errors->first('umr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.area.fields.umr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tunjangan_kemahalan') ? 'has-error' : '' }}">
                            <label for="tunjangan_kemahalan">{{ trans('cruds.area.fields.tunjangan_kemahalan') }}</label>
                            <input class="form-control" type="number" name="tunjangan_kemahalan" id="tunjangan_kemahalan" value="{{ old('tunjangan_kemahalan', $area->tunjangan_kemahalan) }}" step="0.01">
                            @if($errors->has('tunjangan_kemahalan'))
                                <span class="help-block" role="alert">{{ $errors->first('tunjangan_kemahalan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.area.fields.tunjangan_kemahalan_helper') }}</span>
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