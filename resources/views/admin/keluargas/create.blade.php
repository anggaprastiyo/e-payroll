@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.keluarga.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.keluargas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label for="user_id">{{ trans('cruds.keluarga.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.keluarga.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hubungan_keluarga') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.keluarga.fields.hubungan_keluarga') }}</label>
                            <select class="form-control" name="hubungan_keluarga" id="hubungan_keluarga" required>
                                <option value disabled {{ old('hubungan_keluarga', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Keluarga::HUBUNGAN_KELUARGA_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('hubungan_keluarga', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hubungan_keluarga'))
                                <span class="help-block" role="alert">{{ $errors->first('hubungan_keluarga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.hubungan_keluarga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_kelamin') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.keluarga.fields.jenis_kelamin') }}</label>
                            @foreach(App\Models\Keluarga::JENIS_KELAMIN_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="jenis_kelamin_{{ $key }}" name="jenis_kelamin" value="{{ $key }}" {{ old('jenis_kelamin', '') === (string) $key ? 'checked' : '' }} required>
                                    <label for="jenis_kelamin_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('jenis_kelamin'))
                                <span class="help-block" role="alert">{{ $errors->first('jenis_kelamin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.jenis_kelamin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : '' }}">
                            <label class="required" for="tempat_lahir">{{ trans('cruds.keluarga.fields.tempat_lahir') }}</label>
                            <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', '') }}" required>
                            @if($errors->has('tempat_lahir'))
                                <span class="help-block" role="alert">{{ $errors->first('tempat_lahir') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.tempat_lahir_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal_lahir">{{ trans('cruds.keluarga.fields.tanggal_lahir') }}</label>
                            <input class="form-control date" type="text" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                            @if($errors->has('tanggal_lahir'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_lahir') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.tanggal_lahir_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('agama') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.keluarga.fields.agama') }}</label>
                            <select class="form-control" name="agama" id="agama" required>
                                <option value disabled {{ old('agama', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Keluarga::AGAMA_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('agama', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('agama'))
                                <span class="help-block" role="alert">{{ $errors->first('agama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.agama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_ktp') ? 'has-error' : '' }}">
                            <label for="no_ktp">{{ trans('cruds.keluarga.fields.no_ktp') }}</label>
                            <input class="form-control" type="text" name="no_ktp" id="no_ktp" value="{{ old('no_ktp', '') }}">
                            @if($errors->has('no_ktp'))
                                <span class="help-block" role="alert">{{ $errors->first('no_ktp') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.no_ktp_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_kk') ? 'has-error' : '' }}">
                            <label class="required" for="no_kk">{{ trans('cruds.keluarga.fields.no_kk') }}</label>
                            <input class="form-control" type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', '') }}" required>
                            @if($errors->has('no_kk'))
                                <span class="help-block" role="alert">{{ $errors->first('no_kk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.no_kk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('no_bpjskes') ? 'has-error' : '' }}">
                            <label for="no_bpjskes">{{ trans('cruds.keluarga.fields.no_bpjskes') }}</label>
                            <input class="form-control" type="text" name="no_bpjskes" id="no_bpjskes" value="{{ old('no_bpjskes', '') }}">
                            @if($errors->has('no_bpjskes'))
                                <span class="help-block" role="alert">{{ $errors->first('no_bpjskes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.keluarga.fields.no_bpjskes_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                            <label for="alamat">{{ trans('cruds.keluarga.fields.alamat') }}</label>
                            <textarea class="form-control" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                            @if($errors->has('alamat'))
                                <span class="help-block" role="alert">{{ $errors->first('alamat') }}</span>
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



        </div>
    </div>
</div>
@endsection