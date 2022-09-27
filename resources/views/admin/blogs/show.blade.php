@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
      Blog Details
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        Headline
                    </th>
                    <td>
                        {{ $blog->headline }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Written By
                    </th>
                    <td>
                        {{ $blog->written_by }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Description
                    </th>
                    <td>
                        {{ $blog->description}}
                    </td>
                </tr>
                <tr>
                    <th>
                         Date
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($blog->date)) }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Video Link
                    </th>
                    <td>
                        {{ $blog->video_link }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Pictures
                    </th>
                    <td>
                        @foreach($media as $pictures)
                        <img width="100%"  src="{{asset('public/uploads/events/'.$pictures->picture)}}" alt="{{$blog->title}}">
                        </br>
                        @endforeach
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection