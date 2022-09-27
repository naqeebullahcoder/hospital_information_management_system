@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Faculty Member Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                    <img src="{{asset('public/faculty-members-pictures/'.$faculty_resource->picture)}}" alt="{{$faculty_resource->name }} " height="auto" width="150px" >
                    </td>
                </tr>
                <tr>
                    <th>
                       Name
                    </th>
                    <td>
                        {{ $faculty_resource->user->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Designation
                    </th>
                    <td>
                        @if($faculty_resource->designation_id!=null)
                            {{ $faculty_resource->designation->name }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        Email
                    </th>
                    <td>
                        {!! $faculty_resource->email !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Date of Birth
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($faculty_resource->dob)) ?? '' }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Joining Date
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($faculty_resource->joining_date)) ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Biography
                    </th>
                    <td>
                        {!! $faculty_resource->biography !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Qualification
                    </th>
                    <td>
                        {!! $faculty_resource->qualification !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Department
                    </th>
                    <td>
                        @if($faculty_resource->department_id!=null)
                        {{ $faculty_resource->department->name }}
                        @endif
                    </td>
                </tr>
{{----}}
                <tr>
                    <th>
                        CNIC
                    </th>
                    <td>
                        {!! $faculty_resource->cnic !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        License #
                    </th>
                    <td>
                        {!! $faculty_resource->license_no !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Specialization
                    </th>
                    <td>
                        {!! $faculty_resource->specialization !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Mobile No
                    </th>
                    <td>
                        {!! $faculty_resource->mobile_no !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Phone No
                    </th>
                    <td>
                        {!! $faculty_resource->phone_no !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Fee
                    </th>
                    <td>
                        {!! $faculty_resource->fee !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        address
                    </th>
                    <td>
                        {!! $faculty_resource->Address !!}
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>





@endsection
