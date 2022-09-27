@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Press Release Details
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Headline
                    </th>
                    <td>
                        {{ $press->headline }}
                    </td>
                </tr>
                {{--<tr>--}}
                    {{--<th>--}}
                        {{--Written By--}}
                    {{--</th>--}}
                    {{--<td>--}}
                        {{--{{ $press_release->written_by }}--}}
                    {{--</td>--}}
                {{--</tr>--}}
                <tr>
                    <th>
                        Description
                    </th>
                    <td>
                        {{ $press->description}}
                    </td>
                </tr>
                <tr>
                    <th>
                         Date
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($press->date)) }}
                    </td>
                </tr>
                {{--<tr>--}}
                    {{--<th>--}}
                        {{--Video Link--}}
                    {{--</th>--}}
                    {{--<td>--}}
                        {{--{{ $press->video_link }}--}}
                    {{--</td>--}}
                {{--</tr>tr--}}
                <tr>
                    <th>
                        Pictures
                    </th>
                    <td>
                        @foreach($media as $pictures)
                        <img width="100%"  src="{{asset('public/uploads/events/'.$pictures->picture)}}" alt="{{$press->title}}">
                        </br>
                        @endforeach
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection