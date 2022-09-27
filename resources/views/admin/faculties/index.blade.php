@extends('layouts.admin')
@section('content')
    @can('faculties_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.faculties.create") }}">
                    Add Faculties
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Faculties
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

                        <th>
                            Priority
                        </th>

                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($faculties as $key => $faculty)
                        <tr data-entry-id="{{ $faculty->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $faculty->name ?? '' }}
                            </td>
                            <td>
                                {{ $faculty->priority ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--<a class="btn btn-xs btn-primary" href="{{ route('admin.faculties.show',$program->id) }}">--}}
                                   {{--Edit Scheme of Studies--}}
                                {{--</a>--}}
                            {{--</td>--}}

                            <td>

                                @can('faculties_show')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.faculties.show', $faculty->id) }}">
                                       show
                                    </a>
                                @endcan
                                @can('faculties_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.faculties.edit', $faculty->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('faculties_delete')
                                    <form action="{{ route('admin.faculties.destroy', $faculty->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
