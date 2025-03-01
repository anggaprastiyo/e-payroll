@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.refBpj.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ref-bpjs.update", [$refBpj->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="kode">{{ trans('cruds.refBpj.fields.kode') }}</label>
                <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text" name="kode" id="kode" value="{{ old('kode', $refBpj->kode) }}">
                @if($errors->has('kode'))
                    <span class="text-danger">{{ $errors->first('kode') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.refBpj.fields.kode_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.refBpj.fields.provider') }}</label>
                @foreach(App\Models\RefBpj::PROVIDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('provider') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="provider_{{ $key }}" name="provider" value="{{ $key }}" {{ old('provider', $refBpj->provider) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="provider_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('provider'))
                    <span class="text-danger">{{ $errors->first('provider') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.refBpj.fields.provider_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.refBpj.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $refBpj->nama) }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.refBpj.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="presentase">{{ trans('cruds.refBpj.fields.presentase') }}</label>
                <input class="form-control {{ $errors->has('presentase') ? 'is-invalid' : '' }}" type="number" name="presentase" id="presentase" value="{{ old('presentase', $refBpj->presentase) }}" step="0.01" required>
                @if($errors->has('presentase'))
                    <span class="text-danger">{{ $errors->first('presentase') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.refBpj.fields.presentase_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.refBpj.fields.jenis_beban') }}</label>
                @foreach(App\Models\RefBpj::JENIS_BEBAN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('jenis_beban') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="jenis_beban_{{ $key }}" name="jenis_beban" value="{{ $key }}" {{ old('jenis_beban', $refBpj->jenis_beban) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jenis_beban_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('jenis_beban'))
                    <span class="text-danger">{{ $errors->first('jenis_beban') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.refBpj.fields.jenis_beban_helper') }}</span>
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