@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.studentPayroll.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.student-payrolls.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.studentPayroll.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_amount">{{ trans('cruds.studentPayroll.fields.course_amount') }}</label>
                <input class="form-control {{ $errors->has('course_amount') ? 'is-invalid' : '' }}" type="text" name="course_amount" id="course_amount" value="{{ old('course_amount', '') }}" required>
                @if($errors->has('course_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.course_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid_amount">{{ trans('cruds.studentPayroll.fields.paid_amount') }}</label>
                <input class="form-control {{ $errors->has('paid_amount') ? 'is-invalid' : '' }}" type="number" name="paid_amount" id="paid_amount" value="{{ old('paid_amount', '') }}" step="0.01">
                @if($errors->has('paid_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.paid_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_amount">{{ trans('cruds.studentPayroll.fields.due_amount') }}</label>
                <input class="form-control {{ $errors->has('due_amount') ? 'is-invalid' : '' }}" type="number" name="due_amount" id="due_amount" value="{{ old('due_amount', '') }}" step="0.01">
                @if($errors->has('due_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.due_amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_date">{{ trans('cruds.studentPayroll.fields.due_date') }}</label>
                <input class="form-control date {{ $errors->has('due_date') ? 'is-invalid' : '' }}" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}">
                @if($errors->has('due_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.due_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="paid_date">{{ trans('cruds.studentPayroll.fields.paid_date') }}</label>
                <input class="form-control date {{ $errors->has('paid_date') ? 'is-invalid' : '' }}" type="text" name="paid_date" id="paid_date" value="{{ old('paid_date') }}">
                @if($errors->has('paid_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.paid_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.studentPayroll.fields.note') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{!! old('note') !!}</textarea>
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.note_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attechment">{{ trans('cruds.studentPayroll.fields.attechment') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attechment') ? 'is-invalid' : '' }}" id="attechment-dropzone">
                </div>
                @if($errors->has('attechment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attechment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.studentPayroll.fields.attechment_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.student-payrolls.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $studentPayroll->id ?? 0 }}');
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

<script>
    var uploadedAttechmentMap = {}
Dropzone.options.attechmentDropzone = {
    url: '{{ route('admin.student-payrolls.storeMedia') }}',
    maxFilesize: 20, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="attechment[]" value="' + response.name + '">')
      uploadedAttechmentMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedAttechmentMap[file.name]
      }
      $('form').find('input[name="attechment[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($studentPayroll) && $studentPayroll->attechment)
          var files =
            {!! json_encode($studentPayroll->attechment) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="attechment[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection