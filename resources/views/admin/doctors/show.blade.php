@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Doctor Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Doctor Name
                    </th>
                    <td>
                        {{ $doctor->name}}
                    </td>
                </tr>
                <tr>
                    <th>
                       CNIC
                    </th>
                    <td>
                        {{ $doctor->cnic}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Qualification
                    </th>
                    <td>
                        {{$doctor-> qualification}}
                    </td>
                </tr>

                <tr>
                    <th>
                        License #
                    </th>
                    <td>
                        {{ $doctor->license_no}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Specialization
                    </th>
                    <td>
                        {{$doctor->specialization	}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Mobile #
                    </th>
                    <td>
                        {{$doctor->mobile_no}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Phone #
                    </th>
                    <td>
                        {{$doctor->phone_no}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Fee
                    </th>
                    <td>
                        {{ $doctor->fee}}
                    </td>
                </tr>
                <tr>
                    <th>
                       Address
                    </th>
                    <td>
                        {{ $doctor->address}}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection