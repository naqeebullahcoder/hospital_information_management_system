@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Office Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                    <img src="{{asset('public/images/'.$office->picture)}}" alt="{{$office->name }} " height="auto"  >
                    </td>
                </tr>
                <tr>
                    <th>
                       Name
                    </th>
                    <td>
                        {{ $office->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Introduction
                    </th>
                    <td>

                            {{ $office->introduction}}

                    </td>
                </tr>


                <tr>
                    <th>
                        Contact Person Name
                    </th>
                    <td>

                        {{ $office->contact_person_name}}

                    </td>
                </tr>
                <tr>
                    <th>
                        Contact Person Number
                    </th>
                    <td>

                        {{ $office->contact_person_number}}

                    </td>
                </tr>
                <tr>
                    <th>
                        Contact Person Email
                    </th>
                    <td>

                        {{ $office->contact_person_email}}

                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>


@endsection
