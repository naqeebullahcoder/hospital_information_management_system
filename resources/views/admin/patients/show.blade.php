@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Patient Details
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                       MR #
                    </th>
                    <td>
                        {{ $patient->id}}
                    </td>
                </tr>
            <tr>
            <tr>
                    <th>
                        Patient Name
                    </th>
                    <td>
                        {{ $patient->name}}
                    </td>
                </tr>
            <tr>
                <th>
                    Mobile #
                </th>
                <td>
                    {{ $patient->mobile_no}}
                </td>
            </tr>
                <tr>
                    <th>
                        CNIC
                    </th>
                    <td>
                        {{ $patient->cnic}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Gender
                    </th>
                    <td>
                        {{ $patient->gender}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Date of Birth
                    </th>
                    <td>
                        {{$patient->dob	}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Marital Status
                    </th>
                    <td>
                        {{ $patient->marital_status}}
                    </td>
                </tr>

                <tr>
                    <th>
                        City
                    </th>
                    <td>
                        {{$patient->city}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Monthly Income
                    </th>
                    <td>
                        {{ $patient->monthly_income}}
                    </td>
                </tr>
            <tr>
                <th>
                    Street Address
                </th>
                <td>
                    {{ $patient->street_address}}
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection