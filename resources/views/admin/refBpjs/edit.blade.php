@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.refBpj.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.ref-bpjs.update", [$refBpj->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}">
                            <label for="kode">{{ trans('cruds.refBpj.fields.kode') }}</label>
                            <input class="form-control" type="text" name="kode" id="kode" value="{{ old('kode', $refBpj->kode) }}">
                            @if($errors->has('kode'))
                                <span class="help-block" role="alert">{{ $errors->first('kode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.refBpj.fields.kode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('provider') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.refBpj.fields.provider') }}</label>
                            @foreach(App\Models\RefBpj::PROVIDER_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="provider_{{ $key }}" name="provider" value="{{ $key }}" {{ old('provider', $refBpj->provider) === (string) $key ? 'checked' : '' }} required>
                                    <label for="provider_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('provider'))
                                <span class="help-block" role="alert">{{ $errors->first('provider') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.refBpj.fields.provider_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.refBpj.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', $refBpj->nama) }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.refBpj.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('presentase') ? 'has-error' : '' }}">
                            <label class="required" for="presentase">{{ trans('cruds.refBpj.fields.presentase') }}</label>
                            <input class="form-control" type="number" name="presentase" id="presentase" value="{{ old('presentase', $refBpj->presentase) }}" step="0.01" required>
                            @if($errors->has('presentase'))
                                <span class="help-block" role="alert">{{ $errors->first('presentase') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.refBpj.fields.presentase_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_beban') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.refBpj.fields.jenis_beban') }}</label>
                            @foreach(App\Models\RefBpj::JENIS_BEBAN_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="jenis_beban_{{ $key }}" name="jenis_beban" value="{{ $key }}" {{ old('jenis_beban', $refBpj->jenis_beban) === (string) $key ? 'checked' : '' }} required>
                                    <label for="jenis_beban_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('jenis_beban'))
                                <span class="help-block" role="alert">{{ $errors->first('jenis_beban') }}</span>
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



        </div>
    </div>
</div>
@endsection