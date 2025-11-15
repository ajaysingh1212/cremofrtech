@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.student.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="select_user_id">{{ trans('cruds.student.fields.select_user') }}</label>
                <select class="form-control select2 {{ $errors->has('select_user') ? 'is-invalid' : '' }}" name="select_user_id" id="select_user_id" required>
                    @foreach($select_users as $id => $entry)
                        <option value="{{ $id }}" {{ old('select_user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.select_user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="refered_by_id">{{ trans('cruds.student.fields.refered_by') }}</label>
                <select class="form-control select2 {{ $errors->has('refered_by') ? 'is-invalid' : '' }}" name="refered_by_id" id="refered_by_id">
                    @foreach($refered_bies as $id => $entry)
                        <option value="{{ $id }}" {{ old('refered_by_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('refered_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('refered_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.refered_by_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="select_courses">{{ trans('cruds.student.fields.select_course') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('select_courses') ? 'is-invalid' : '' }}" name="select_courses[]" id="select_courses" multiple>
                    @foreach($select_courses as $id => $select_course)
                        <option value="{{ $id }}" {{ in_array($id, old('select_courses', [])) ? 'selected' : '' }}>{{ $select_course }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_courses'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_courses') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.select_course_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.student.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone_number">{{ trans('cruds.student.fields.phone_number') }}</label>
                <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                @if($errors->has('phone_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="father_name">{{ trans('cruds.student.fields.father_name') }}</label>
                <input class="form-control {{ $errors->has('father_name') ? 'is-invalid' : '' }}" type="text" name="father_name" id="father_name" value="{{ old('father_name', '') }}">
                @if($errors->has('father_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('father_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.father_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mother_name">{{ trans('cruds.student.fields.mother_name') }}</label>
                <input class="form-control {{ $errors->has('mother_name') ? 'is-invalid' : '' }}" type="text" name="mother_name" id="mother_name" value="{{ old('mother_name', '') }}">
                @if($errors->has('mother_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mother_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.mother_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="dob">{{ trans('cruds.student.fields.dob') }}</label>
                <input class="form-control date {{ $errors->has('dob') ? 'is-invalid' : '' }}" type="text" name="dob" id="dob" value="{{ old('dob') }}" required>
                @if($errors->has('dob'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dob') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.dob_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.student.fields.gender') }}</label>
                @foreach(App\Models\Student::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qualification">{{ trans('cruds.student.fields.qualification') }}</label>
                <input class="form-control {{ $errors->has('qualification') ? 'is-invalid' : '' }}" type="text" name="qualification" id="qualification" value="{{ old('qualification', '') }}" required>
                @if($errors->has('qualification'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qualification') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.qualification_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="parmanet_address">{{ trans('cruds.student.fields.parmanet_address') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('parmanet_address') ? 'is-invalid' : '' }}" name="parmanet_address" id="parmanet_address">{!! old('parmanet_address') !!}</textarea>
                @if($errors->has('parmanet_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parmanet_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.parmanet_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="present_address">{{ trans('cruds.student.fields.present_address') }}</label>
                <input class="form-control {{ $errors->has('present_address') ? 'is-invalid' : '' }}" type="text" name="present_address" id="present_address" value="{{ old('present_address', '') }}">
                @if($errors->has('present_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('present_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.present_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_of_joing">{{ trans('cruds.student.fields.date_of_joing') }}</label>
                <input class="form-control date {{ $errors->has('date_of_joing') ? 'is-invalid' : '' }}" type="text" name="date_of_joing" id="date_of_joing" value="{{ old('date_of_joing') }}">
                @if($errors->has('date_of_joing'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_of_joing') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.date_of_joing_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="course_fee">{{ trans('cruds.student.fields.course_fee') }}</label>
                <input class="form-control {{ $errors->has('course_fee') ? 'is-invalid' : '' }}" type="number" name="course_fee" id="course_fee" value="{{ old('course_fee', '') }}" step="0.01">
                @if($errors->has('course_fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course_fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.course_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.student.fields.discount_type') }}</label>
                <select class="form-control {{ $errors->has('discount_type') ? 'is-invalid' : '' }}" name="discount_type" id="discount_type">
                    <option value disabled {{ old('discount_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Student::DISCOUNT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('discount_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('discount_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.discount_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="discount">{{ trans('cruds.student.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', '') }}" step="0.01">
                @if($errors->has('discount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('discount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="due_amount">{{ trans('cruds.student.fields.due_amount') }}</label>
                <input class="form-control {{ $errors->has('due_amount') ? 'is-invalid' : '' }}" type="text" name="due_amount" id="due_amount" value="{{ old('due_amount', '') }}">
                @if($errors->has('due_amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('due_amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.due_amount_helper') }}</span>
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
                xhr.open('POST', '{{ route('admin.students.storeCKEditorImages') }}', true);
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
                data.append('crud_id', '{{ $student->id ?? 0 }}');
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