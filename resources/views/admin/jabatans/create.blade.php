@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.jabatan.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.jabatans.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('kantor') ? 'has-error' : '' }}">
                            <label class="required" for="kantor_id">{{ trans('cruds.jabatan.fields.kantor') }}</label>
                            <select class="form-control select2" name="kantor_id" id="kantor_id" required>
                                @foreach($kantors as $id => $entry)
                                    <option value="{{ $id }}" {{ old('kantor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('kantor'))
                                <span class="help-block" role="alert">{{ $errors->first('kantor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.kantor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kode') ? 'has-error' : '' }}">
                            <label for="kode">{{ trans('cruds.jabatan.fields.kode') }}</label>
                            <input class="form-control" type="text" name="kode" id="kode" value="{{ old('kode', '') }}">
                            @if($errors->has('kode'))
                                <span class="help-block" role="alert">{{ $errors->first('kode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.kode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.jabatan.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('koefisien_tunjangan') ? 'has-error' : '' }}">
                            <label for="koefisien_tunjangan">{{ trans('cruds.jabatan.fields.koefisien_tunjangan') }}</label>
                            <input class="form-control" type="number" name="koefisien_tunjangan" id="koefisien_tunjangan" value="{{ old('koefisien_tunjangan', '0') }}" step="0.01">
                            @if($errors->has('koefisien_tunjangan'))
                                <span class="help-block" role="alert">{{ $errors->first('koefisien_tunjangan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.koefisien_tunjangan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_lembur_otomatis') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.jabatan.fields.is_lembur_otomatis') }}</label>
                            @foreach(App\Models\Jabatan::IS_LEMBUR_OTOMATIS_RADIO as $key => $label)
                                <div>
                                    <input type="radio" id="is_lembur_otomatis_{{ $key }}" name="is_lembur_otomatis" value="{{ $key }}" {{ old('is_lembur_otomatis', '0') === (string) $key ? 'checked' : '' }} required>
                                    <label for="is_lembur_otomatis_{{ $key }}" style="font-weight: 400">{{ $label }}</label>
                                </div>
                            @endforeach
                            @if($errors->has('is_lembur_otomatis'))
                                <span class="help-block" role="alert">{{ $errors->first('is_lembur_otomatis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.is_lembur_otomatis_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tujangan_kinerja') ? 'has-error' : '' }}">
                            <label class="required" for="tujangan_kinerja">{{ trans('cruds.jabatan.fields.tujangan_kinerja') }}</label>
                            <input class="form-control" type="number" name="tujangan_kinerja" id="tujangan_kinerja" value="{{ old('tujangan_kinerja', '0') }}" step="0.01" required>
                            @if($errors->has('tujangan_kinerja'))
                                <span class="help-block" role="alert">{{ $errors->first('tujangan_kinerja') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.tujangan_kinerja_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tunjangan_komunikasi') ? 'has-error' : '' }}">
                            <label class="required" for="tunjangan_komunikasi">{{ trans('cruds.jabatan.fields.tunjangan_komunikasi') }}</label>
                            <input class="form-control" type="number" name="tunjangan_komunikasi" id="tunjangan_komunikasi" value="{{ old('tunjangan_komunikasi', '0') }}" step="0.01" required>
                            @if($errors->has('tunjangan_komunikasi'))
                                <span class="help-block" role="alert">{{ $errors->first('tunjangan_komunikasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.tunjangan_komunikasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tunjangan_cuti') ? 'has-error' : '' }}">
                            <label class="required" for="tunjangan_cuti">{{ trans('cruds.jabatan.fields.tunjangan_cuti') }}</label>
                            <input class="form-control" type="number" name="tunjangan_cuti" id="tunjangan_cuti" value="{{ old('tunjangan_cuti', '0') }}" step="0.01" required>
                            @if($errors->has('tunjangan_cuti'))
                                <span class="help-block" role="alert">{{ $errors->first('tunjangan_cuti') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.tunjangan_cuti_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tunjangan_pakaian') ? 'has-error' : '' }}">
                            <label class="required" for="tunjangan_pakaian">{{ trans('cruds.jabatan.fields.tunjangan_pakaian') }}</label>
                            <input class="form-control" type="number" name="tunjangan_pakaian" id="tunjangan_pakaian" value="{{ old('tunjangan_pakaian', '0') }}" step="0.01" required>
                            @if($errors->has('tunjangan_pakaian'))
                                <span class="help-block" role="alert">{{ $errors->first('tunjangan_pakaian') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.tunjangan_pakaian_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tunjangan_jabatan') ? 'has-error' : '' }}">
                            <label class="required" for="tunjangan_jabatan">{{ trans('cruds.jabatan.fields.tunjangan_jabatan') }}</label>
                            <input class="form-control" type="number" name="tunjangan_jabatan" id="tunjangan_jabatan" value="{{ old('tunjangan_jabatan', '0') }}" step="0.01" required>
                            @if($errors->has('tunjangan_jabatan'))
                                <span class="help-block" role="alert">{{ $errors->first('tunjangan_jabatan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.tunjangan_jabatan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tunjangan_kemahalan') ? 'has-error' : '' }}">
                            <label class="required" for="tunjangan_kemahalan">{{ trans('cruds.jabatan.fields.tunjangan_kemahalan') }}</label>
                            <input class="form-control" type="number" name="tunjangan_kemahalan" id="tunjangan_kemahalan" value="{{ old('tunjangan_kemahalan', '') }}" step="0.01" required>
                            @if($errors->has('tunjangan_kemahalan'))
                                <span class="help-block" role="alert">{{ $errors->first('tunjangan_kemahalan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.jabatan.fields.tunjangan_kemahalan_helper') }}</span>
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