@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.studentPayroll.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-payrolls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.id') }}
                        </th>
                        <td>
                            {{ $studentPayroll->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.student') }}
                        </th>
                        <td>
                            {{ $studentPayroll->student->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.course_amount') }}
                        </th>
                        <td>
                            {{ $studentPayroll->course_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.paid_amount') }}
                        </th>
                        <td>
                            {{ $studentPayroll->paid_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.due_amount') }}
                        </th>
                        <td>
                            {{ $studentPayroll->due_amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.due_date') }}
                        </th>
                        <td>
                            {{ $studentPayroll->due_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.paid_date') }}
                        </th>
                        <td>
                            {{ $studentPayroll->paid_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.note') }}
                        </th>
                        <td>
                            {!! $studentPayroll->note !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.attechment') }}
                        </th>
                        <td>
                            @foreach($studentPayroll->attechment as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.student-payrolls.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection