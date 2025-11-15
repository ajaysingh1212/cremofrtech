@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.timeWorkType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-work-types.update", [$timeWorkType->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.timeWorkType.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $timeWorkType->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeWorkType.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="select_user_id">{{ trans('cruds.timeWorkType.fields.select_user') }}</label>
                <select class="form-control select2 {{ $errors->has('select_user') ? 'is-invalid' : '' }}" name="select_user_id" id="select_user_id">
                    @foreach($select_users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('select_user_id') ? old('select_user_id') : $timeWorkType->select_user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('select_user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('select_user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timeWorkType.fields.select_user_helper') }}</span>
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