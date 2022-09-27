@extends('layouts.admin')
@section('content')

<div class="card">
        <div class="card-header">
           New Patient
        </div>

    <div class="card-body">
        <form action="{{ route("admin.orderforms.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="title">Name*</label>
                <input type="text" id="name" name="name" class="form-control" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Mobile #</label>
                <input type="text" id="mobile_no" name="mobile_no" class="form-control" required>
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Gender*</label>
                <select  id="gender" name="gender" class="form-control select2" required>
                    <option value="Male" > Male</option>
                    <option value="Female" > Female</option>
                </select>
                @if($errors->has('title'))
                <em class="invalid-feedback">
                {{ $errors->first('title') }}
                </em>
            @endif
            <p class="helper-block">
            {{ trans('global.product.fields.name_helper') }}
            </p>
            </div>


            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">CNIC</label>
                <input type="text" id="cnic" name="cnic" class="form-control"  >
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>


            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Age</label>
                <input type="number" id="age" name="age" class="form-control" >
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Street Address</label>
                    <textarea type="text" id="street_address" name="street_address" class="form-control" ></textarea>
                    @if($errors->has('description'))
                    <em class="invalid-feedback">
                    {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>

</div>

<div class="card">
    <div class="card-header">
        Registered Patient
    </div>
    <form action="{{ route("admin.orderforms.store") }}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="col-lg-12">
                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status"></label>

                    <select name="patient_id" id="patient_id" class="form-control select2" required>
                        <option value="" disabled selected>Select Patient</option>
                        @foreach($patients as $patient)
                            <option value="{{$patient->id}}">
                                MR{{$patient->id}} - {{$patient->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_category_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
            </div>

            <div class="col-lg-2">
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </div>
        <br/>

        </form>
</div>

    <div class="card">
        <div class="card-header">
            Order Forms
        </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    Invoice #
                                </th>
                                <th>
                                    Patient
                                </th>
                                <th>
                                    Services
                                </th>
                                <th>
                                    Amount
                                </th>
                                <th>
                                   Date
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>

                                </th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderforms as $key => $orderform)
                                <tr data-entry-id="{{$orderform->patient_id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $orderform->id ?? '' }}
                                    </td>

                                    <td>
                                        {{ $orderform->patient_id ?? '' }} - {{ $orderform->patients->name ?? '' }}
                                    </td>
                                    <td>
                                        @if($orderform->OrderDetails!=null)
                                        @foreach($orderform->OrderDetails as  $item)
                                            @if($item->Service!=null)
                                                    <span class="badge badge-info">{{ $item->Service->name ?? ''}}</span>
                                            @elseif($item->Doctor!=null)
                                                    <span class="badge badge-info">Consult {{ $item->Doctor->User->name ?? ''}}</span>
                                            @endif

                                        @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        {{ $orderform->OrderDetails->sum('amount') ?? '' }}
                                    </td>

                                    <td>
                                        {{ date('d-m-Y', strtotime($orderform->date)) ?? '' }}
                                    </td>
                                    <td>
                                        {{ $orderform->Status->name ?? '' }}
                                    </td>
{{--                                    <td>--}}
{{--                                        {{App\Status::find($orderform->status)->name}}--}}
{{--                                    </td>--}}

                                    <td>

                                        {{--@can('$oderform_show')--}}
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.orderforms.show', $orderform) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                        {{--@endcan--}}
                                        {{--@can('$oderform_edit')--}}
                                        @if($orderform->status==5)
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.orderforms.edit', $orderform->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>

                                        {{--@endcan--}}
                                        {{--@can('orderform_delete')--}}
                                            <form action="{{ route('admin.orderforms.destroy', $orderform) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endif
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
