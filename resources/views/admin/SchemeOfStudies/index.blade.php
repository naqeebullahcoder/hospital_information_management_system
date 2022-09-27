@extends('layouts.admin')
@section('content')
    @can('scheme_of_study_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.scheme-of-studies.create",['id'=>$program->id]) }}">
                    Add Scheme
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">

                Scheme of Study ({{ $program->name}})
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Semester
                        </th>
                        <th>
                            Course Code
                        </th>
                        <th>
                            Course Title
                        </th>
                        <th>
                            &nbsp;Cr.Hrs.
                        </th>
                        <th>
                            &nbsp;Semester
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schem_of_studies as $key => $schem_of_study)
                        <tr data-entry-id="{{ $schem_of_study->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $schem_of_study->semester?? '' }}
                            </td>
                            <td>
                                {{ $schem_of_study->course->code ?? '' }}
                            </td>

                            <td>
                                {{ $schem_of_study->course->title ?? '' }}
                            </td>
                            <td>
                                {{ $schem_of_study->course_credit_hours?? '' }}-{{$schem_of_study->lab_credit_hours}}
                            </td>


                            <td>

                                @can('scheme_of_study_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.scheme-of-studies.edit', $schem_of_study->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('scheme_of_study_delete')
                                    <form action="{{ route('admin.scheme-of-studies.destroy', $schem_of_study->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
