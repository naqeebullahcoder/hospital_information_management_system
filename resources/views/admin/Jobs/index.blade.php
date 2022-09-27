@extends('layouts.admin')
@section('content')
    @can('jobs_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.jobs.create") }}">
                    Add Job
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Jobs
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Job Title
                        </th>
                        <th th >
                             Type
                        </th>
                        <th>
                            Opening Date
                        </th>
                        <th>
                            Closing Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $key => $jobs)
                        <tr data-entry-id="{{ $jobs->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $jobs->title ?? '' }}
                            </td>
                            <td>
                                {{ App\JobTypes::find($jobs->type)->name }}
                            </td>
                            <td>
                                @if($jobs->opening_date)
                                {{ date('d-m-Y', strtotime($jobs->opening_date)) ?? '' }}
                                @endif
                            </td>
                            <td>
                                @if($jobs->closing_date)
                                {{ date('d-m-Y', strtotime($jobs->closing_date)) ?? '' }}
                                @endif
                            </td>
                            <td>
                                {{App\Status::find($jobs->status)->name  }}
                            </td>

                            <td>
                                @can('jobs_show')
                                @if($jobs->file!=null)
                                <a class="btn btn-xs btn-primary" href="{{ asset('public/uploads/jobs/'.$jobs->file) }}">
                                    {{ trans('global.view') }}
                                </a>
                                @endif
                                @endcan
                                @can('jobs_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.jobs.edit', $jobs->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('jobs_delete')
                                    <form action="{{ route('admin.jobs.destroy', $jobs) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
