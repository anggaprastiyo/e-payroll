@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.potonganGaji.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.potongan-gajis.update", [$potonganGaji->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
                            <label class="required" for="user_id">{{ trans('cruds.potonganGaji.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $potonganGaji->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <span class="help-block" role="alert">{{ $errors->first('user') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganGaji.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rekanan') ? 'has-error' : '' }}">
                            <label class="required" for="rekanan_id">{{ trans('cruds.potonganGaji.fields.rekanan') }}</label>
                            <select class="form-control select2" name="rekanan_id" id="rekanan_id" required>
                                @foreach($rekanans as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('rekanan_id') ? old('rekanan_id') : $potonganGaji->rekanan->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('rekanan'))
                                <span class="help-block" role="alert">{{ $errors->first('rekanan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganGaji.fields.rekanan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('periode_gaji') ? 'has-error' : '' }}">
                            <label class="required" for="periode_gaji_id">{{ trans('cruds.potonganGaji.fields.periode_gaji') }}</label>
                            <select class="form-control select2" name="periode_gaji_id" id="periode_gaji_id" required>
                                @foreach($periode_gajis as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('periode_gaji_id') ? old('periode_gaji_id') : $potonganGaji->periode_gaji->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('periode_gaji'))
                                <span class="help-block" role="alert">{{ $errors->first('periode_gaji') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganGaji.fields.periode_gaji_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
                            <label for="keterangan">{{ trans('cruds.potonganGaji.fields.keterangan') }}</label>
                            <textarea class="form-control ckeditor" name="keterangan" id="keterangan">{!! old('keterangan', $potonganGaji->keterangan) !!}</textarea>
                            @if($errors->has('keterangan'))
                                <span class="help-block" role="alert">{{ $errors->first('keterangan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganGaji.fields.keterangan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nominal') ? 'has-error' : '' }}">
                            <label class="required" for="nominal">{{ trans('cruds.potonganGaji.fields.nominal') }}</label>
                            <input class="form-control" type="number" name="nominal" id="nominal" value="{{ old('nominal', $potonganGaji->nominal) }}" step="0.01" required>
                            @if($errors->has('nominal'))
                                <span class="help-block" role="alert">{{ $errors->first('nominal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.potonganGaji.fields.nominal_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.potongan-gajis.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $potonganGaji->id ?? 0 }}');
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