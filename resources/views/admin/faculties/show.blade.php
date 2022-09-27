@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          Faculties Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                    <img src="{{asset('public/uploads/images/'.$faculty->picture)}}" alt="{{$faculty->name }} " height="auto" width="150px" >
                    </td>
                </tr>
                <tr>
                    <th>
                       Name
                    </th>
                    <td>
                        {{ $faculty->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        introduction
                    </th>
                    <td>

                            {{ $faculty->introduction}}

                    </td>
                </tr>
                <tr>
                    <th>
                        chairman
                    </th>
                    <td>
                        {!! $faculty->chairman !!}
                    </td>
                </tr>
                <tr>
                    <th>
                        priority
                    </th>
                    <td>
                        {!! $faculty->priority !!}
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>


@endsection
