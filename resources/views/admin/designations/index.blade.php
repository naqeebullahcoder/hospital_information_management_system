@extends('layouts.admin')
@section('content')
{{--@can('designation_create')--}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.designations.create") }}">
               Add Designation
            </a>
        </div>
    </div>
{{--@endcan--}}
<div class="card">
    <div class="card-header">
        Designations List
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Designation
                        </th>
                        {{--<th>--}}
                            {{--Priority--}}
                        {{--</th>--}}
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($designations as $key => $designation)
                        <tr data-entry-id="{{ $designation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $designation->name ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $designation->priority ?? '' }}--}}
                            {{--</td>--}}
                            <td>
                                {{--@can('permission_show')--}}
                                    {{--<a class="btn btn-xs btn-primary" href="{{ route('admin.designations.show', $designation->id) }}">--}}
                                        {{--{{ trans('global.view') }}--}}
                                    {{--</a>--}}
                                {{--@endcan--}}
                                {{--@can('designation_edit')--}}
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.designations.edit', $designation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                {{--@endcan--}}
                                {{--@can('designation_delete')--}}
                                    <form action="{{ route('admin.designations.destroy', $designation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                {{--@endcan--}}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.permissions.massDestroy') }}",
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
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('permission_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection