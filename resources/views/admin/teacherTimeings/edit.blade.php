@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.teacherTimeing.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.teacher-timeings.update", [$teacherTimeing->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="teacher_id">{{ trans('cruds.teacherTimeing.fields.teacher') }}</label>
                <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id">
                    @foreach($teachers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('teacher_id') ? old('teacher_id') : $teacherTimeing->teacher->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('teacher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacherTimeing.fields.teacher_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="classes_timeing">{{ trans('cruds.teacherTimeing.fields.classes_timeing') }}</label>
                <input class="form-control timepicker {{ $errors->has('classes_timeing') ? 'is-invalid' : '' }}" type="text" name="classes_timeing" id="classes_timeing" value="{{ old('classes_timeing', $teacherTimeing->classes_timeing) }}">
                @if($errors->has('classes_timeing'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classes_timeing') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacherTimeing.fields.classes_timeing_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="selecte_days">{{ trans('cruds.teacherTimeing.fields.selecte_days') }}</label>
                <input class="form-control {{ $errors->has('selecte_days') ? 'is-invalid' : '' }}" type="text" name="selecte_days" id="selecte_days" value="{{ old('selecte_days', $teacherTimeing->selecte_days) }}">
                @if($errors->has('selecte_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('selecte_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teacherTimeing.fields.selecte_days_helper') }}</span>
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