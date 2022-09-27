@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Department Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                    <img src="{{asset('public/uploads/images/'.$department->picture)}}" alt="{{$department->name }} " height="auto" width="150px" >
                    </td>
                </tr>
                <tr>
                    <th>
                       Name
                    </th>
                    <td>
                        {{ $department->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Introduction
                    </th>
                    <td>

                            {{ $department->introduction}}

                    </td>
                </tr>

                <tr>
                    <th>
                        Thumbnail
                    </th>
                    <td>

                        <img src="{{asset('public/uploads/images/'.$department->thumbnail)}}" alt="{{$department->name }} " height="auto" width="150px" >

                    </td>
                </tr>
                <tr>
                    <th>
                        Vision
                    </th>
                    <td>

                        {{ $department->vision}}

                    </td>
                </tr>
                <tr>
                    <th>
                        Mission
                    </th>
                    <td>

                        {{ $department->mission}}

                    </td>
                </tr>
                <tr>
                    <th>
                        Contact Person Name
                    </th>
                    <td>

                        {{ $department->contact_person_name}}

                    </td>
                </tr>
                <tr>
                    <th>
                        Contact Person Number
                    </th>
                    <td>

                        {{ $department->contact_person_number}}

                    </td>
                </tr>
                <tr>
                    <th>
                        Contact Person Email
                    </th>
                    <td>

                        {{ $department->contact_person_email}}

                    </td>
                </tr>
                {{--<tr>--}}
                    {{--<th>--}}
                       {{--Faculty--}}
                    {{--</th>--}}
                    {{--<td>--}}

                        {{--{{ $department->faculty->name}}--}}

                    {{--</td>--}}
                {{--</tr>--}}
                <tr>
                    <th>
                        Parent Department
                    </th>
                    <td>
                        @if($department->parent_id!=null)
                        {{ $department->department->name}}
                        @endif
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>


@endsection
