@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.gajiBulananDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.gaji-bulanan-details.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('gaji_bulanan') ? 'has-error' : '' }}">
                            <label class="required" for="gaji_bulanan_id">{{ trans('cruds.gajiBulananDetail.fields.gaji_bulanan') }}</label>
                            <select class="form-control select2" name="gaji_bulanan_id" id="gaji_bulanan_id" required>
                                @foreach($gaji_bulanans as $id => $entry)
                                    <option value="{{ $id }}" {{ old('gaji_bulanan_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('gaji_bulanan'))
                                <span class="help-block" role="alert">{{ $errors->first('gaji_bulanan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.gaji_bulanan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.gajiBulananDetail.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('gaji_pokok') ? 'has-error' : '' }}">
                            <label class="required" for="gaji_pokok">{{ trans('cruds.gajiBulananDetail.fields.gaji_pokok') }}</label>
                            <input class="form-control" type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', '0') }}" step="0.01" required>
                            @if($errors->has('gaji_pokok'))
                                <span class="help-block" role="alert">{{ $errors->first('gaji_pokok') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.gaji_pokok_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_tunjangan') ? 'has-error' : '' }}">
                            <label class="required" for="total_tunjangan">{{ trans('cruds.gajiBulananDetail.fields.total_tunjangan') }}</label>
                            <input class="form-control" type="number" name="total_tunjangan" id="total_tunjangan" value="{{ old('total_tunjangan', '0') }}" step="0.01" required>
                            @if($errors->has('total_tunjangan'))
                                <span class="help-block" role="alert">{{ $errors->first('total_tunjangan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_tunjangan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_iuran_bpjstk') ? 'has-error' : '' }}">
                            <label class="required" for="total_iuran_bpjstk">{{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjstk') }}</label>
                            <input class="form-control" type="number" name="total_iuran_bpjstk" id="total_iuran_bpjstk" value="{{ old('total_iuran_bpjstk', '0') }}" step="0.01" required>
                            @if($errors->has('total_iuran_bpjstk'))
                                <span class="help-block" role="alert">{{ $errors->first('total_iuran_bpjstk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjstk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_iuran_bpjskes') ? 'has-error' : '' }}">
                            <label class="required" for="total_iuran_bpjskes">{{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjskes') }}</label>
                            <input class="form-control" type="number" name="total_iuran_bpjskes" id="total_iuran_bpjskes" value="{{ old('total_iuran_bpjskes', '0') }}" step="0.01" required>
                            @if($errors->has('total_iuran_bpjskes'))
                                <span class="help-block" role="alert">{{ $errors->first('total_iuran_bpjskes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_iuran_bpjskes_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_lembur') ? 'has-error' : '' }}">
                            <label class="required" for="total_lembur">{{ trans('cruds.gajiBulananDetail.fields.total_lembur') }}</label>
                            <input class="form-control" type="number" name="total_lembur" id="total_lembur" value="{{ old('total_lembur', '0') }}" step="0.01" required>
                            @if($errors->has('total_lembur'))
                                <span class="help-block" role="alert">{{ $errors->first('total_lembur') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_lembur_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_pajak') ? 'has-error' : '' }}">
                            <label class="required" for="total_pajak">{{ trans('cruds.gajiBulananDetail.fields.total_pajak') }}</label>
                            <input class="form-control" type="number" name="total_pajak" id="total_pajak" value="{{ old('total_pajak', '0') }}" step="0.01" required>
                            @if($errors->has('total_pajak'))
                                <span class="help-block" role="alert">{{ $errors->first('total_pajak') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_pajak_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_premi_bpjstk') ? 'has-error' : '' }}">
                            <label class="required" for="total_premi_bpjstk">{{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjstk') }}</label>
                            <input class="form-control" type="number" name="total_premi_bpjstk" id="total_premi_bpjstk" value="{{ old('total_premi_bpjstk', '0') }}" step="0.01" required>
                            @if($errors->has('total_premi_bpjstk'))
                                <span class="help-block" role="alert">{{ $errors->first('total_premi_bpjstk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjstk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_premi_bpjskes') ? 'has-error' : '' }}">
                            <label class="required" for="total_premi_bpjskes">{{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjskes') }}</label>
                            <input class="form-control" type="number" name="total_premi_bpjskes" id="total_premi_bpjskes" value="{{ old('total_premi_bpjskes', '0') }}" step="0.01" required>
                            @if($errors->has('total_premi_bpjskes'))
                                <span class="help-block" role="alert">{{ $errors->first('total_premi_bpjskes') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_premi_bpjskes_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('premi_taspen_save') ? 'has-error' : '' }}">
                            <label class="required" for="premi_taspen_save">{{ trans('cruds.gajiBulananDetail.fields.premi_taspen_save') }}</label>
                            <input class="form-control" type="number" name="premi_taspen_save" id="premi_taspen_save" value="{{ old('premi_taspen_save', '0') }}" step="0.01" required>
                            @if($errors->has('premi_taspen_save'))
                                <span class="help-block" role="alert">{{ $errors->first('premi_taspen_save') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.premi_taspen_save_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_potongan_absensi') ? 'has-error' : '' }}">
                            <label class="required" for="total_potongan_absensi">{{ trans('cruds.gajiBulananDetail.fields.total_potongan_absensi') }}</label>
                            <input class="form-control" type="number" name="total_potongan_absensi" id="total_potongan_absensi" value="{{ old('total_potongan_absensi', '0') }}" step="0.01" required>
                            @if($errors->has('total_potongan_absensi'))
                                <span class="help-block" role="alert">{{ $errors->first('total_potongan_absensi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_potongan_absensi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_potongan_pihak_ketiga') ? 'has-error' : '' }}">
                            <label class="required" for="total_potongan_pihak_ketiga">{{ trans('cruds.gajiBulananDetail.fields.total_potongan_pihak_ketiga') }}</label>
                            <input class="form-control" type="number" name="total_potongan_pihak_ketiga" id="total_potongan_pihak_ketiga" value="{{ old('total_potongan_pihak_ketiga', '0') }}" step="0.01" required>
                            @if($errors->has('total_potongan_pihak_ketiga'))
                                <span class="help-block" role="alert">{{ $errors->first('total_potongan_pihak_ketiga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_potongan_pihak_ketiga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_thp') ? 'has-error' : '' }}">
                            <label class="required" for="total_thp">{{ trans('cruds.gajiBulananDetail.fields.total_thp') }}</label>
                            <input class="form-control" type="number" name="total_thp" id="total_thp" value="{{ old('total_thp', '0') }}" step="0.01" required>
                            @if($errors->has('total_thp'))
                                <span class="help-block" role="alert">{{ $errors->first('total_thp') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.gajiBulananDetail.fields.total_thp_helper') }}</span>
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