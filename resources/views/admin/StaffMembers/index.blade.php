@extends('layouts.admin')
@section('content')
    @can('staff_member_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.staff-members.create") }}">
                    Add Staff Member
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            Staff Members
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.product.fields.name') }}
                        </th>
                        <th>
                            Office
                        </th>
                        <th>
                            Designation
                        </th>
                        <th>
                            Email
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($staff_members != null)

                    @foreach($staff_members as $key => $staff_member)
                        <tr data-entry-id="{{ $staff_member->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $staff_member->name ?? '' }}
                            </td>
                            <td>
                                @foreach(App\StaffMemberJobResponsibilities::where('staff_member_id',$staff_member->id)->orderby('priority')->get() as  $job_responsibility)
                                    <span class="badge badge-info"> {{ $job_responsibility->office->name?? '' }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach(App\StaffMemberJobResponsibilities::where('staff_member_id',$staff_member->id)->orderby('priority')->get() as  $job_responsibility)
                                    <span class="badge badge-info"> {{ $job_responsibility->designation->name?? '' }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $staff_member->email?? '' }}
                            </td>
                            <td>
                                @can('staff_member_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.staff-members.show',$staff_member->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('staff_member_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.staff-members.edit', $staff_member->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('staff_member_delete')
                                    <form action="{{ route('admin.staff-members.destroy', $staff_member->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                    @endif
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
