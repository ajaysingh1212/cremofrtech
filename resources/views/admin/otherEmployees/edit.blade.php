@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.otherEmployee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.other-employees.update", [$otherEmployee->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="select_employee_id">{{ trans('cruds.otherEmployee.fields.select_employee') }}</label>
                <select class="form-control select2 {{ $errors->has('select_employee') ? 'is-invalid' : '' }}" name="select_employee_id" id="select_employee_id">
                    @foreach($select_employees as $id => $entry)
                        <option value="{{ $id }}" {{ (old('select_employee_id') ? old('select_employee_id') : $otherEmployee->select_employee->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_employee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_employee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.select_employee_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.otherEmployee.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $otherEmployee->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.otherEmployee.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', $otherEmployee->phone_number) }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_joining">{{ trans('cruds.otherEmployee.fields.date_of_joining') }}</label>
                <input class="form-control date {{ $errors->has('date_of_joining') ? 'is-invalid' : '' }}" type="text" name="date_of_joining" id="date_of_joining" value="{{ old('date_of_joining', $otherEmployee->date_of_joining) }}" required>
                @if($errors->has('date_of_joining'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_joining') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.date_of_joining_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="salary">{{ trans('cruds.otherEmployee.fields.salary') }}</label>
                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="text" name="salary" id="salary" value="{{ old('salary', $otherEmployee->salary) }}">
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="present_address">{{ trans('cruds.otherEmployee.fields.present_address') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('present_address') ? 'is-invalid' : '' }}" name="present_address" id="present_address">{!! old('present_address', $otherEmployee->present_address) !!}</textarea>
                @if($errors->has('present_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('present_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.present_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parmanent_address">{{ trans('cruds.otherEmployee.fields.parmanent_address') }}</label>
                <input class="form-control {{ $errors->has('parmanent_address') ? 'is-invalid' : '' }}" type="text" name="parmanent_address" id="parmanent_address" value="{{ old('parmanent_address', $otherEmployee->parmanent_address) }}">
                @if($errors->has('parmanent_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parmanent_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.parmanent_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="aadhar">{{ trans('cruds.otherEmployee.fields.aadhar') }}</label>
                <input class="form-control {{ $errors->has('aadhar') ? 'is-invalid' : '' }}" type="text" name="aadhar" id="aadhar" value="{{ old('aadhar', $otherEmployee->aadhar) }}">
                @if($errors->has('aadhar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('aadhar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.aadhar_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.otherEmployee.fields.working_days') }}</label>
                <select class="form-control {{ $errors->has('working_days') ? 'is-invalid' : '' }}" name="working_days" id="working_days">
                    <option value disabled {{ old('working_days', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\OtherEmployee::WORKING_DAYS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('working_days', $otherEmployee->working_days) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('working_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('working_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.working_days_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.otherEmployee.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status">
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\OtherEmployee::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $otherEmployee->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="attechment">{{ trans('cruds.otherEmployee.fields.attechment') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attechment') ? 'is-invalid' : '' }}" id="attechment-dropzone">
                </div>
                @if($errors->has('attechment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('attechment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.otherEmployee.fields.attechment_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.other-employees.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $otherEmployee->id ?? 0 }}');
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
    Dropzone.options.attechmentDropzone = {
    url: '{{ route('admin.other-employees.storeMedia') }}',
    maxFilesize: 20, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20
    },
    success: function (file, response) {
      $('form').find('input[name="attechment"]').remove()
      $('form').append('<input type="hidden" name="attechment" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="attechment"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($otherEmployee) && $otherEmployee->attechment)
      var file = {!! json_encode($otherEmployee->attechment) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="attechment" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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