@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.keluarga.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.keluargas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.keluarga.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nama">{{ trans('cruds.keluarga.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                @if($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.keluarga.fields.hubungan_keluarga') }}</label>
                <select class="form-control {{ $errors->has('hubungan_keluarga') ? 'is-invalid' : '' }}" name="hubungan_keluarga" id="hubungan_keluarga" required>
                    <option value disabled {{ old('hubungan_keluarga', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Keluarga::HUBUNGAN_KELUARGA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hubungan_keluarga', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hubungan_keluarga'))
                    <span class="text-danger">{{ $errors->first('hubungan_keluarga') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.hubungan_keluarga_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.keluarga.fields.jenis_kelamin') }}</label>
                @foreach(App\Models\Keluarga::JENIS_KELAMIN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="jenis_kelamin_{{ $key }}" name="jenis_kelamin" value="{{ $key }}" {{ old('jenis_kelamin', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jenis_kelamin_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('jenis_kelamin'))
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.jenis_kelamin_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tempat_lahir">{{ trans('cruds.keluarga.fields.tempat_lahir') }}</label>
                <input class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', '') }}" required>
                @if($errors->has('tempat_lahir'))
                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.tempat_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal_lahir">{{ trans('cruds.keluarga.fields.tanggal_lahir') }}</label>
                <input class="form-control date {{ $errors->has('tanggal_lahir') ? 'is-invalid' : '' }}" type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                @if($errors->has('tanggal_lahir'))
                    <span class="text-danger">{{ $errors->first('tanggal_lahir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.tanggal_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.keluarga.fields.agama') }}</label>
                <select class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" name="agama" id="agama" required>
                    <option value disabled {{ old('agama', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Keluarga::AGAMA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('agama', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('agama'))
                    <span class="text-danger">{{ $errors->first('agama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.agama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_ktp">{{ trans('cruds.keluarga.fields.no_ktp') }}</label>
                <input class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}" type="text" name="no_ktp" id="no_ktp" value="{{ old('no_ktp', '') }}">
                @if($errors->has('no_ktp'))
                    <span class="text-danger">{{ $errors->first('no_ktp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.no_ktp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_kk">{{ trans('cruds.keluarga.fields.no_kk') }}</label>
                <input class="form-control {{ $errors->has('no_kk') ? 'is-invalid' : '' }}" type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', '') }}" required>
                @if($errors->has('no_kk'))
                    <span class="text-danger">{{ $errors->first('no_kk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.no_kk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_bpjskes">{{ trans('cruds.keluarga.fields.no_bpjskes') }}</label>
                <input class="form-control {{ $errors->has('no_bpjskes') ? 'is-invalid' : '' }}" type="text" name="no_bpjskes" id="no_bpjskes" value="{{ old('no_bpjskes', '') }}">
                @if($errors->has('no_bpjskes'))
                    <span class="text-danger">{{ $errors->first('no_bpjskes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.no_bpjskes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.keluarga.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.keluarga.fields.alamat_helper') }}</span>
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