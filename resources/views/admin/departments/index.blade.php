{{--@extends('layouts.admin')--}}
{{--@section('content')--}}
{{--    @can('department_create')--}}
        {{--<div style="margin-bottom: 10px;" class="row">--}}
            {{--<div class="col-lg-12">--}}
                {{--<a class="btn btn-success" href="{{ route("admin.departments.create") }}">--}}
                    {{--Add Departments--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}
{{--    @endcan--}}
    {{--<div class="card">--}}
        {{--<div class="card-header">--}}
            {{--Departments--}}
        {{--</div>--}}

        {{--<div class="card-body">--}}
            {{--<div class="table-responsive">--}}
                {{--<table class=" table table-bordered table-striped table-hover datatable">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th width="10">--}}

                        {{--</th>--}}

                        {{--<th>--}}
                             {{--Id--}}
                        {{--</th>--}}

                        {{--<th>--}}
                            {{--Name--}}
                        {{--</th>--}}

                        {{--<th>--}}

                        {{--</th>--}}

                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($departments as $key => $department)--}}
                        {{--<tr data-entry-id="{{ $department->id }}">--}}
                            {{--<td>--}}

                            {{--</td>--}}
                            {{--<td>--}}
                                {{--{{ $department->id ?? '' }}--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--{{ $department->name?? '' }}--}}
                            {{--</td>--}}

                            {{--<td>--}}

                                {{--<a class="btn btn-xs btn-info" href="{{ route('admin.departments.show', $department->id) }}">--}}
                                   {{--Show--}}
                                {{--</a>--}}

                                {{--@can('department_edit')--}}
                                    {{--<a class="btn btn-xs btn-info" href="{{ route('admin.departments.edit', $department->id) }}">--}}
                                        {{--{{ trans('global.edit') }}--}}
                                    {{--</a>--}}
                                {{--@endcan--}}
                                {{--@can('department_delete')--}}
                                    {{--<form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">--}}
                                        {{--<input type="hidden" name="_method" value="DELETE">--}}
                                        {{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
                                        {{--<input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">--}}
                                    {{--</form>--}}
                                {{--@endcan--}}
                            {{--</td>--}}

                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--@section('scripts')--}}
    {{--@parent--}}
    {{--<script>--}}
        {{--$(function () {--}}
            {{--let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'--}}
            {{--let deleteButton = {--}}
                {{--text: deleteButtonTrans,--}}
                {{--url: "{{ route('admin.products.massDestroy') }}",--}}
                {{--className: 'btn-danger',--}}
                {{--action: function (e, dt, node, config) {--}}
                    {{--var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {--}}
                        {{--return $(entry).data('entry-id')--}}
                    {{--});--}}

                    {{--if (ids.length === 0) {--}}
                        {{--alert('{{ trans('global.datatables.zero_selected') }}')--}}

                        {{--return--}}
                    {{--}--}}

                    {{--if (confirm('{{ trans('global.areYouSure') }}')) {--}}
                        {{--$.ajax({--}}
                            {{--headers: {'x-csrf-token': _token},--}}
                            {{--method: 'POST',--}}
                            {{--url: config.url,--}}
                            {{--data: { ids: ids, _method: 'DELETE' }})--}}
                            {{--.done(function () { location.reload() })--}}
                    {{--}--}}
                {{--}--}}
            {{--}--}}
            {{--let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)--}}
            {{--@can('product_delete')--}}
            {{--dtButtons.push(deleteButton)--}}
            {{--@endcan--}}

            {{--$('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })--}}
        {{--})--}}

    {{--</script>--}}
{{--@endsection--}}
{{--@endsection--}}


@extends('layouts.admin')
@section('content')
    {{--@can('department_create')--}}
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.departments.create") }}">
                    Add Departments
                </a>
            </div>
        </div>
    {{--@endcan--}}
    <div class="card">
        <div class="card-header">
            Departments
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
                            Parent
                        </th>

                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($departments as $key => $department)
                        <tr data-entry-id="{{ $department->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $department->name ?? '' }}
                            </td>
                            <td>
                                {{ $department->department->name?? '' }}
                            </td>

                            <td>

                                <a class="btn btn-xs btn-info" href="{{ route('admin.departments.show', $department->id) }}">
                                    Show
                                </a>

                                {{--@can('department_edit')--}}
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.departments.edit', $department->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                {{--@endcan--}}
                                {{--@can('department_delete')--}}
                                    <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

