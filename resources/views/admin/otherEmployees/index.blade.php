@extends('layouts.admin')
@section('content')
@can('other_employee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.other-employees.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.otherEmployee.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'OtherEmployee', 'route' => 'admin.other-employees.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.otherEmployee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-OtherEmployee">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.select_employee') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.date_of_joining') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.parmanent_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.aadhar') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.working_days') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.status') }}
                        </th>
                        <th>
                            {{ trans('cruds.otherEmployee.fields.attechment') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($otherEmployees as $key => $otherEmployee)
                        <tr data-entry-id="{{ $otherEmployee->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $otherEmployee->id ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->select_employee->name ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->select_employee->email ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->name ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->date_of_joining ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->salary ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->parmanent_address ?? '' }}
                            </td>
                            <td>
                                {{ $otherEmployee->aadhar ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\OtherEmployee::WORKING_DAYS_SELECT[$otherEmployee->working_days] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\OtherEmployee::STATUS_SELECT[$otherEmployee->status] ?? '' }}
                            </td>
                            <td>
                                @if($otherEmployee->attechment)
                                    <a href="{{ $otherEmployee->attechment->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('other_employee_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.other-employees.show', $otherEmployee->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('other_employee_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.other-employees.edit', $otherEmployee->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('other_employee_delete')
                                    <form action="{{ route('admin.other-employees.destroy', $otherEmployee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('other_employee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.other-employees.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-OtherEmployee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection