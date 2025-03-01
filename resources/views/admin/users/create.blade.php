@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $role)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jabatan_id">{{ trans('cruds.user.fields.jabatan') }}</label>
                <select class="form-control select2 {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" name="jabatan_id" id="jabatan_id">
                    @foreach($jabatans as $id => $entry)
                        <option value="{{ $id }}" {{ old('jabatan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('jabatan'))
                    <span class="text-danger">{{ $errors->first('jabatan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.jabatan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.user.fields.jenis_pegawai') }}</label>
                @foreach(App\Models\User::JENIS_PEGAWAI_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('jenis_pegawai') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="jenis_pegawai_{{ $key }}" name="jenis_pegawai" value="{{ $key }}" {{ old('jenis_pegawai', '1') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jenis_pegawai_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('jenis_pegawai'))
                    <span class="text-danger">{{ $errors->first('jenis_pegawai') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.jenis_pegawai_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.user.fields.jenis_kelamin') }}</label>
                @foreach(App\Models\User::JENIS_KELAMIN_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="jenis_kelamin_{{ $key }}" name="jenis_kelamin" value="{{ $key }}" {{ old('jenis_kelamin', '1') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="jenis_kelamin_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('jenis_kelamin'))
                    <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.jenis_kelamin_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">{{ trans('cruds.user.fields.tempat_lahir') }}</label>
                <input class="form-control {{ $errors->has('tempat_lahir') ? 'is-invalid' : '' }}" type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', '') }}">
                @if($errors->has('tempat_lahir'))
                    <span class="text-danger">{{ $errors->first('tempat_lahir') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.tempat_lahir_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.user.fields.agama') }}</label>
                <select class="form-control {{ $errors->has('agama') ? 'is-invalid' : '' }}" name="agama" id="agama">
                    <option value disabled {{ old('agama', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\User::AGAMA_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('agama', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('agama'))
                    <span class="text-danger">{{ $errors->first('agama') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.agama_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_ktp">{{ trans('cruds.user.fields.no_ktp') }}</label>
                <input class="form-control {{ $errors->has('no_ktp') ? 'is-invalid' : '' }}" type="text" name="no_ktp" id="no_ktp" value="{{ old('no_ktp', '') }}" required>
                @if($errors->has('no_ktp'))
                    <span class="text-danger">{{ $errors->first('no_ktp') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.no_ktp_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_kk">{{ trans('cruds.user.fields.no_kk') }}</label>
                <input class="form-control {{ $errors->has('no_kk') ? 'is-invalid' : '' }}" type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', '') }}" required>
                @if($errors->has('no_kk'))
                    <span class="text-danger">{{ $errors->first('no_kk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.no_kk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tmt_masuk">{{ trans('cruds.user.fields.tmt_masuk') }}</label>
                <input class="form-control date {{ $errors->has('tmt_masuk') ? 'is-invalid' : '' }}" type="text" name="tmt_masuk" id="tmt_masuk" value="{{ old('tmt_masuk') }}" required>
                @if($errors->has('tmt_masuk'))
                    <span class="text-danger">{{ $errors->first('tmt_masuk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.tmt_masuk_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_bpjstk">{{ trans('cruds.user.fields.no_bpjstk') }}</label>
                <input class="form-control {{ $errors->has('no_bpjstk') ? 'is-invalid' : '' }}" type="text" name="no_bpjstk" id="no_bpjstk" value="{{ old('no_bpjstk', '') }}">
                @if($errors->has('no_bpjstk'))
                    <span class="text-danger">{{ $errors->first('no_bpjstk') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.no_bpjstk_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="no_bpjskes">{{ trans('cruds.user.fields.no_bpjskes') }}</label>
                <input class="form-control {{ $errors->has('no_bpjskes') ? 'is-invalid' : '' }}" type="text" name="no_bpjskes" id="no_bpjskes" value="{{ old('no_bpjskes', '') }}" required>
                @if($errors->has('no_bpjskes'))
                    <span class="text-danger">{{ $errors->first('no_bpjskes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.no_bpjskes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.user.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat') }}</textarea>
                @if($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_rekening">{{ trans('cruds.user.fields.no_rekening') }}</label>
                <input class="form-control {{ $errors->has('no_rekening') ? 'is-invalid' : '' }}" type="text" name="no_rekening" id="no_rekening" value="{{ old('no_rekening', '') }}">
                @if($errors->has('no_rekening'))
                    <span class="text-danger">{{ $errors->first('no_rekening') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.no_rekening_helper') }}</span>
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