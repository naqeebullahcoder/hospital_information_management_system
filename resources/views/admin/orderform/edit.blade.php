@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Order Form
        </div>

        <div class="card-body">
            <form action="{{ route("admin.orderforms.update",[$orderform]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text" rows="1" id="order_id" name="order_id"  class="form-control" hidden value="{{ old('order_id', isset($orderform) ? $orderform->id : '') }}"></input>
                <input type="text" rows="1" id="patient_id" name="patient_id"  class="form-control" hidden value="{{ old('patient_id', isset($orderform) ? $orderform->patient_id : '') }}"></input>


                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                    <label for="description">Patient</label>
                    <input type="text" rows="1" id="patient_name" name="patient_name" disabled  class="form-control" required value="{{ old('patient_name', isset($orderform) ? $orderform->patients->id.' - '.$orderform->patients->name : '') }}"></input>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                {{--<div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">--}}
                    {{--<label for="department_id">Departments </label>--}}
                    {{--<select name="department_id" id="department_id" class="form-control select2">--}}
                        {{--<option value="" selected>Select Department</option>--}}
                        {{--@foreach($departments as $department)--}}
                            {{--<option value="{{$department->id}}">--}}
                                {{--{{$department->name}}</option>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                    {{--@if($errors->has('department_id'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('department_id') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}

                <div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
                    <label for="faculties_id">Service </label>
                    <select name="service_id" id="service_id" class="form-control select2">
                        <option value="" selected>Select Service</option>
                        @foreach($services as $service)
                            <option value="{{$service->id}}">
                                {{$service->name}} - {{$service->charges}} PKR</option>
                        @endforeach
                    </select>
                    @if($errors->has('service_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('service_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('doctor_id') ? 'has-error' : '' }}">
                    <label for="faculties_id">Doctor </label>
                    <select name="doctor_id" id="doctor_id" class="form-control select2">
                        <option value="" selected>Select Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{$doctor->id}}">
                                {{$doctor->User->name}} - {{$doctor->fee}} PKR</option>
                        @endforeach
                    </select>
                    @if($errors->has('doctor_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('doctor_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Quantity</label>
                    <input type="text" id="quantity" name="quantity" class="form-control">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.doctors.fields.name_helper') }}--}}
                    {{--</p>--}}
                </div>


                <div style="margin-bottom: 10px;" class="row">
                 <div class="col-lg-2">

                     <div>
                         <input class="btn  btn-primary"  type="submit" value="Add">
                     </div>
                 </div>
                </div>
        </form>
        </div>


        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                    <tr>
                        <th width="10">
                        S#
                        </th>

                        <th>
                            Description
                        </th>

                        <th>
                            Charges
                        </th>
                        <th>
                           Quantity
                        </th>

                        <th>
                            Total
                        </th>
                        <th>

                        </th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderdetails_data as $key => $orderdetail)
                        <tr data-entry-id="{{$orderdetail->id}}">
                            <td>
                                {{$key+1}}
                            </td>

                            <td>
                                @if($orderdetail->service_id!=null)
                                    {{ $orderdetail->Service->name ?? '' }}
                                @elseif($orderdetail->doctor_id!=null)
                                    Consult {{ $orderdetail->Doctor->User->name ?? '' }}
                                @endif

                            </td>
                            <td>
                                {{ $orderdetail->amount ?? '' }}
                            </td>
                            <td>
                                {{ $orderdetail->quantity ?? '' }}
                            </td>

                            <td>
                                {{ $orderdetail->total ?? '' }}
                            </td>

                            <td>


                                    <form action="{{ route('admin.orderforms.destroy', $orderdetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="float: right;" class="row" >
                    <div class="col-lg-2">

                        <div>
                            <a class="btn  btn-primary" href="#" >Finalize</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
