@extends('layouts.admin')
@section('content')
    {{--    @can('event_create')--}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

        </div>
    </div>
    {{--    @endcan--}}
    <div class="card">
        <div class="card-header">
            Settings
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                          Company  Name
                        </th>
                        <th>
                            Primary Color
                        </th>
                        <th>
                            Secondary Color
                        </th>
                        <th>
                            Logo
                        </th>
                        <th>

                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($settings as $key => $setting)
                        <tr data-entry-id="{{ $setting->id }}">
                            <td>
                            </td>
                            <td>
                                {{ $setting->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $setting->primary_color ?? '' }}
                            </td>
                            <td>
                                {{ $setting->secondary_color ?? '' }}
                            </td>
                            <td>
                                {{ $setting->logo ?? '' }}
                            </td>

                            <td>
                                {{--<a class="btn btn-xs btn-info" href="{{ route('admin.settings.show', $setting->id) }}">--}}
                                    {{--Show--}}
                                {{--</a>--}}

                                <a class="btn btn-xs btn-info" href="{{ route('admin.settings.edit', $setting->id) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                {{--                                @can('event_show')--}}

                                {{--                                @endcan--}}
                                {{--                                @can('event_edit')--}}

                                {{--                                @endcan--}}
                                {{--                                @can('event_delete')--}}
                                {{--<form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
                                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                                    {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                    {{--<input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
                                {{--</form>--}}
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
