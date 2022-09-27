@extends('layouts.admin')
@section('content')
    @can('event_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.press.create") }}">
                    Add Press Release
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Blog
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Headline
                        </th>
                        <th th >
                            Description
                        </th>
                        <th>
                            date
                        </th>
                        {{--<th>--}}
                            {{--written by--}}
                        {{--</th>--}}
                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($press_release as $key => $press)
                        <tr data-entry-id="{{ $press->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $press->headline ?? '' }}
                            </td>
                            <td>
                                {{ $press->description ?? '' }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($press->date)) ?? '' }}
                            </td>
                            {{--<td>--}}
                                {{--{{ $press->written_by ?? '' }}--}}
                            {{--</td>--}}

                            <td>

                                @can('press_show')
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.press.show', $press) }}">
                                    {{ trans('global.view') }}
                                </a>
                                @endcan
                                @can('press_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.press.edit', $press->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('press_delete')
                                    <form action="{{ route('admin.press.destroy', $press) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
