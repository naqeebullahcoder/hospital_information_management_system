@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Staff Member Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                    <img src="{{asset('public/faculty-members-pictures/'.$staff_member->picture)}}" alt="{{$staff_member->name }} " height="auto" width="150px" >
                    </td>
                </tr>
                <tr>
                    <th>
                       Name
                    </th>
                    <td>
                        {{ $staff_member->name }}
                    </td>
                </tr>
                @if(Illuminate\Support\Facades\Session::get('role')==1)
                <tr>
                    <th>
                        Email
                    </th>
                    <td>
                        {{ $staff_member->email }}
                    </td>
                </tr>
                @endif
                <tr>
                    <th>
                        Designation
                    </th>
                    <td>
                        @if($staff_member->designation_id!=null)
                            {{ $staff_member->designation->name }}
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>
                        Joining Date
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($staff_member->joining_date)) ?? '' }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Biography
                    </th>
                    <td>
                        {!! $staff_member->biography !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Qualification
                    </th>
                    <td>
                        {!! $staff_member->qualification !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        Office
                    </th>
                    <td>
                        @if($staff_member->office_id!=null)
                        {{ $staff_member->office->name }}
                        @endif
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
