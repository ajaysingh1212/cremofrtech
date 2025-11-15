@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teacherTimeing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teacher-timeings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teacherTimeing.fields.id') }}
                        </th>
                        <td>
                            {{ $teacherTimeing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacherTimeing.fields.teacher') }}
                        </th>
                        <td>
                            {{ $teacherTimeing->teacher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacherTimeing.fields.classes_timeing') }}
                        </th>
                        <td>
                            {{ $teacherTimeing->classes_timeing }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teacherTimeing.fields.selecte_days') }}
                        </th>
                        <td>
                            {{ $teacherTimeing->selecte_days }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teacher-timeings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection