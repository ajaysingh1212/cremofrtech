@extends('layouts.admin')
@section('content')
@can('student_payroll_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.student-payrolls.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.studentPayroll.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'StudentPayroll', 'route' => 'admin.student-payrolls.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.studentPayroll.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-StudentPayroll">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.student') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.course_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.paid_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.due_amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.due_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.paid_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.studentPayroll.fields.attechment') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($studentPayrolls as $key => $studentPayroll)
                        <tr data-entry-id="{{ $studentPayroll->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $studentPayroll->id ?? '' }}
                            </td>
                            <td>
                                {{ $studentPayroll->student->name ?? '' }}
                            </td>
                            <td>
                                {{ $studentPayroll->student->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $studentPayroll->course_amount ?? '' }}
                            </td>
                            <td>
                                {{ $studentPayroll->paid_amount ?? '' }}
                            </td>
                            <td>
                                {{ $studentPayroll->due_amount ?? '' }}
                            </td>
                            <td>
                                {{ $studentPayroll->due_date ?? '' }}
                            </td>
                            <td>
                                {{ $studentPayroll->paid_date ?? '' }}
                            </td>
                            <td>
                                @foreach($studentPayroll->attechment as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('student_payroll_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.student-payrolls.show', $studentPayroll->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('student_payroll_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.student-payrolls.edit', $studentPayroll->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('student_payroll_delete')
                                    <form action="{{ route('admin.student-payrolls.destroy', $studentPayroll->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('student_payroll_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.student-payrolls.massDestroy') }}",
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
  let table = $('.datatable-StudentPayroll:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection