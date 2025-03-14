@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.absensiSetting.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.absensi-settings.update", [$absensiSetting->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('kantor') ? 'has-error' : '' }}">
                            <label for="kantor_id">{{ trans('cruds.absensiSetting.fields.kantor') }}</label>
                            <select class="form-control select2" name="kantor_id" id="kantor_id">
                                @foreach($kantors as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('kantor_id') ? old('kantor_id') : $absensiSetting->kantor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kantor'))
                                <span class="help-block" role="alert">{{ $errors->first('kantor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.absensiSetting.fields.kantor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('hari') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.absensiSetting.fields.hari') }}</label>
                            <select class="form-control" name="hari" id="hari" required>
                                <option value disabled {{ old('hari', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AbsensiSetting::HARI_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('hari', $absensiSetting->hari) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('hari'))
                                <span class="help-block" role="alert">{{ $errors->first('hari') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.absensiSetting.fields.hari_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jam_datang') ? 'has-error' : '' }}">
                            <label class="required" for="jam_datang">{{ trans('cruds.absensiSetting.fields.jam_datang') }}</label>
                            <input class="form-control timepicker" type="text" name="jam_datang" id="jam_datang" value="{{ old('jam_datang', $absensiSetting->jam_datang) }}" required>
                            @if($errors->has('jam_datang'))
                                <span class="help-block" role="alert">{{ $errors->first('jam_datang') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.absensiSetting.fields.jam_datang_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jam_pulang') ? 'has-error' : '' }}">
                            <label class="required" for="jam_pulang">{{ trans('cruds.absensiSetting.fields.jam_pulang') }}</label>
                            <input class="form-control timepicker" type="text" name="jam_pulang" id="jam_pulang" value="{{ old('jam_pulang', $absensiSetting->jam_pulang) }}" required>
                            @if($errors->has('jam_pulang'))
                                <span class="help-block" role="alert">{{ $errors->first('jam_pulang') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.absensiSetting.fields.jam_pulang_helper') }}</span>
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