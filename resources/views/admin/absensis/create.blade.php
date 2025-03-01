@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.absensi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.absensis.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.absensi.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.absensi.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tanggal">{{ trans('cruds.absensi.fields.tanggal') }}</label>
                <input class="form-control date {{ $errors->has('tanggal') ? 'is-invalid' : '' }}" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                @if($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.absensi.fields.tanggal_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jam_datang">{{ trans('cruds.absensi.fields.jam_datang') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_datang') ? 'is-invalid' : '' }}" type="text" name="jam_datang" id="jam_datang" value="{{ old('jam_datang') }}" required>
                @if($errors->has('jam_datang'))
                    <span class="text-danger">{{ $errors->first('jam_datang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.absensi.fields.jam_datang_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="jam_pulang">{{ trans('cruds.absensi.fields.jam_pulang') }}</label>
                <input class="form-control timepicker {{ $errors->has('jam_pulang') ? 'is-invalid' : '' }}" type="text" name="jam_pulang" id="jam_pulang" value="{{ old('jam_pulang') }}" required>
                @if($errors->has('jam_pulang'))
                    <span class="text-danger">{{ $errors->first('jam_pulang') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.absensi.fields.jam_pulang_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="keterangan">{{ trans('cruds.absensi.fields.keterangan') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="keterangan">{!! old('keterangan') !!}</textarea>
                @if($errors->has('keterangan'))
                    <span class="text-danger">{{ $errors->first('keterangan') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.absensi.fields.keterangan_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.absensi.fields.status') }}</label>
                @foreach(App\Models\Absensi::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '1') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.absensi.fields.status_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.absensis.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $absensi->id ?? 0 }}');
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