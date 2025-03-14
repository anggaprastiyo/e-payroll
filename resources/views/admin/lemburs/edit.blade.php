@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.lembur.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.lemburs.update", [$lembur->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.lembur.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $lembur->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.lembur.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal">{{ trans('cruds.lembur.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $lembur->tanggal) }}" required>
                            @if($errors->has('tanggal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.lembur.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jam_mulai') ? 'has-error' : '' }}">
                            <label class="required" for="jam_mulai">{{ trans('cruds.lembur.fields.jam_mulai') }}</label>
                            <input class="form-control timepicker" type="text" name="jam_mulai" id="jam_mulai" value="{{ old('jam_mulai', $lembur->jam_mulai) }}" required>
                            @if($errors->has('jam_mulai'))
                                <span class="help-block" role="alert">{{ $errors->first('jam_mulai') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.lembur.fields.jam_mulai_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jam_akhir') ? 'has-error' : '' }}">
                            <label class="required" for="jam_akhir">{{ trans('cruds.lembur.fields.jam_akhir') }}</label>
                            <input class="form-control timepicker" type="text" name="jam_akhir" id="jam_akhir" value="{{ old('jam_akhir', $lembur->jam_akhir) }}" required>
                            @if($errors->has('jam_akhir'))
                                <span class="help-block" role="alert">{{ $errors->first('jam_akhir') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.lembur.fields.jam_akhir_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('keterangan_pekerjaan') ? 'has-error' : '' }}">
                            <label for="keterangan_pekerjaan">{{ trans('cruds.lembur.fields.keterangan_pekerjaan') }}</label>
                            <textarea class="form-control ckeditor" name="keterangan_pekerjaan" id="keterangan_pekerjaan">{!! old('keterangan_pekerjaan', $lembur->keterangan_pekerjaan) !!}</textarea>
                            @if($errors->has('keterangan_pekerjaan'))
                                <span class="help-block" role="alert">{{ $errors->first('keterangan_pekerjaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.lembur.fields.keterangan_pekerjaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.lembur.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Lembur::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $lembur->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.lembur.fields.status_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.lemburs.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $lembur->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection