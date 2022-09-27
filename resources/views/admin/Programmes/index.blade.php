@extends('layouts.admin')
@section('content')
    @can('degree_program_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.programmes.create") }}">
                    Add Degree Program
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Programmes
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>

                        <th>
                            Program Name
                        </th>

                        <th>
                            Department
                        </th>
                        <th>
                           Edit Scheme Of Studies
                        </th>
                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($programmes as $key => $program)
                        <tr data-entry-id="{{ $program->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $program->name ?? '' }}
                            </td>
                            <td>
                                {{ $program->department->name ?? '' }}
                            </td>
                            <td>
                                @can('scheme_of_study_access')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.scheme-of-studies.show',$program->id) }}">
                                   Edit Scheme of Studies
                                </a>
                                @endcan
                            </td>

                            <td>
                                @can('degree_program_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.programmes.show',$program->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('degree_program_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.programmes.edit', $program->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('degree_program_delete')
                                    <form action="{{ route('admin.programmes.destroy', $program->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
