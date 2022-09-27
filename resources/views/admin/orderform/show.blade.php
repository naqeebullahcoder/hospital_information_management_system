@extends('layouts.admin')
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row mb-12">
                    <div class="col-sm-3" style="padding-left: 40px">
                        <img src="{{asset('public/images/logo.png')}}" alt="logo">
                    </div>
                    <div class="col-sm-6">
                        {{--                <span></span>--}}
                        <div class="text-center" style="font-family: sans-serif; line-height: 0.3em">
                            <h4><b>Al REHMAT BENEVOLENT TRUST HOSPITAL</b></h4>
                            <p>Muhallah Khokhar, Pasrur, Sialkot, Punjab</p>
                            <p>PTCL : 052-6443700 | Mobile : 0332-8443700</p>
                            <p>Email: 8443700info@arbthospital.com</p>
                        </div>
                        {{--                <span class="float-right"> <strong>Status:</strong> Pending</span>--}}
                    </div>
                    <div class="col-sm-3">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-12">
                    <div class="col-sm-3">

                        <div>
                            <strong>Invoice #:</strong>
                        </div>
                        <div><strong>Name:</strong></div>
                        <div><strong>Gender:</strong></div>
                        <div><strong>Address:</strong></div>
                    </div>
                    <div class="col-sm-3">
                        <div>{{ $orderform->id}}</div>
                        <div>{{ $orderform->patients->name}}</div>
                        <div>{{ $orderform->patients->gender}}</div>
                        <div>{{ $orderform->patients->street_address}}</div>

                    </div>
                    <div class="col-sm-3">
                        <div><strong>MR #:</strong></div>
                        <div><strong>Age:</strong></div>
                        <div><strong>Mobile:</strong></div>
                        <div><strong>CNIC:</strong></div>

                    </div>
                    <div class="col-sm-3">
                        <div>{{ $orderform->patients->id}}</div>
                        <div>{{ $orderform->patients->dob}}</div>
                        <div>{{ $orderform->patients->mobile_no}}</div>
                        <div>{{ $orderform->patients->cnic}}</div>

                    </div>
                </div>

                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="center">SR#</th>
                            <th>Description</th>
                            <th class="right">Charges</th>
                            <th class="center">Qty</th>
                            <th class="right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orderform->OrderDetails as $key => $orderDetail)
                        <tr>
                            <td class="center">{{$key+1}}</td>
                            @if($orderDetail->service_id!=null)
                                <td class="left strong">{{ $orderDetail->Service->name ?? '' }}</td>
                            @elseif($orderDetail->doctor_id!=null)
                                <td class="left strong">Consult {{ $orderDetail->Doctor->User->name ?? '' }}</td>
                            @endif

                            <td class="left">{{$orderDetail->amount}}</td>
                            <td class="center">1</td>
                            <td class="right">{{$orderDetail->amount}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">

                    </div>

                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                            <tr>
                                <td class="left">
                                    <strong>Subtotal</strong>
                                </td>
                                <td class="right">{{$orderform->OrderDetails->sum('amount')}} PKR</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Discount (0%)</strong>
                                </td>
                                <td class="right">0</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>VAT (0%)</strong>
                                </td>
                                <td class="right">0</td>
                            </tr>
                            <tr>
                                <td class="left">
                                    <strong>Total</strong>
                                </td>
                                <td class="right">
                                    <strong>{{$orderform->OrderDetails->sum('amount')}} PKR</strong>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent

@endsection