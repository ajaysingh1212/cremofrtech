@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.otherEmployee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.other-employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.id') }}
                        </th>
                        <td>
                            {{ $otherEmployee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.select_employee') }}
                        </th>
                        <td>
                            {{ $otherEmployee->select_employee->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.name') }}
                        </th>
                        <td>
                            {{ $otherEmployee->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.phone_number') }}
                        </th>
                        <td>
                            {{ $otherEmployee->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.date_of_joining') }}
                        </th>
                        <td>
                            {{ $otherEmployee->date_of_joining }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.salary') }}
                        </th>
                        <td>
                            {{ $otherEmployee->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.present_address') }}
                        </th>
                        <td>
                            {!! $otherEmployee->present_address !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.parmanent_address') }}
                        </th>
                        <td>
                            {{ $otherEmployee->parmanent_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.aadhar') }}
                        </th>
                        <td>
                            {{ $otherEmployee->aadhar }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.working_days') }}
                        </th>
                        <td>
                            {{ App\Models\OtherEmployee::WORKING_DAYS_SELECT[$otherEmployee->working_days] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.status') }}
                        </th>
                        <td>
                            {{ App\Models\OtherEmployee::STATUS_SELECT[$otherEmployee->status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.attechment') }}
                        </th>
                        <td>
                            @if($otherEmployee->attechment)
                                <a href="{{ $otherEmployee->attechment->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.other-employees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection