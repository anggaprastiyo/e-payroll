@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.area.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.areas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.area.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.area.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="umr">{{ trans('cruds.area.fields.umr') }}</label>
                <input class="form-control {{ $errors->has('umr') ? 'is-invalid' : '' }}" type="number" name="umr" id="umr" value="{{ old('umr', '') }}" step="0.01" required>
                @if($errors->has('umr'))
                    <span class="text-danger">{{ $errors->first('umr') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.area.fields.umr_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tunjangan_kemahalan">{{ trans('cruds.area.fields.tunjangan_kemahalan') }}</label>
                <input class="form-control {{ $errors->has('tunjangan_kemahalan') ? 'is-invalid' : '' }}" type="number" name="tunjangan_kemahalan" id="tunjangan_kemahalan" value="{{ old('tunjangan_kemahalan', '') }}" step="0.01">
                @if($errors->has('tunjangan_kemahalan'))
                    <span class="text-danger">{{ $errors->first('tunjangan_kemahalan') }}</span>
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



@endsection