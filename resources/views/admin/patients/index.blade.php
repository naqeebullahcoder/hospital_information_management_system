@extends('layouts.admin')
@section('content')
{{--    @can('event_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.patients.create") }}">
                    Add Patients
                </a>
            </div>
        </div>
{{--    @endcan--}}
    <div class="card">
        <div class="card-header">
            Patients
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                             MR #
                        </th>
                        <th>
                             Name
                        </th>
                        <th>
                             Gender
                        </th>
                        <th>
                            Mobile #
                        </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($patients as $key => $patient)
                        <tr data-entry-id="{{ $patient->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $patient->id ?? '' }}
                            </td>
                            <td>
                                {{ $patient->name ?? '' }}
                            </td>
                            <td>
                                {{ $patient->gender ?? '' }}
                            </td>
                            <td>
                                {{ $patient->mobile_no ?? '' }}
                            </td>
{{--                            <td>--}}
{{--                                {{App\Status::find($events_data->status)->name}}--}}
{{--                            </td>--}}


                            <td>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.patients.show', $patient->id) }}">
                                    Show
                                </a>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.patients.edit', $patient->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
{{--                                @can('event_show')--}}

{{--                                @endcan--}}
{{--                                @can('event_edit')--}}

{{--                                @endcan--}}
{{--                                @can('event_delete')--}}
                                    <form action="{{ route('admin.patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
{{--                                @endcan--}}
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
