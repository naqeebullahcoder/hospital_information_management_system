@extends('layouts.admin')
@section('content')
    @can('office_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.offices.create") }}">
                    Add Office
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Offices
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>

                        <th>
                             Name
                        </th>

                        {{--<th>--}}
                            {{--Parent--}}
                        {{--</th>--}}

                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($offices as $key => $office)
                        <tr data-entry-id="{{ $office->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $office->name ?? '' }}
                            </td>

                            <td>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.offices.show', $office->id) }}">
                                   Show
                                </a>

                                {{--@can('department_edit')--}}
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.offices.edit', $office->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                {{--@endcan--}}
                                {{--@can('department_delete')--}}
                                    <form action="{{ route('admin.offices.destroy', $office->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                url: "{{ route('admin.products.massDestroy') }}",
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
            @can('product_delete')
            dtButtons.push(deleteButton)
            @endcan

            $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        })

    </script>
@endsection
@endsection
