@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        News Details
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        News Title
                    </th>
                    <td>
                        {{ $news->title }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Description
                    </th>
                    <td>
                        {{ $news->description}}
                    </td>
                </tr>
                <tr>
                    <th>
                        News Date
                    </th>
                    <td>
                        {{ date('d-m-Y', strtotime($news->date)) }}
                    </td>
                </tr>
                <tr>
                    <th>
                        News Link
                    </th>
                    <td>
                        {{ $news->news_link }}
                    </td>
                </tr>
                <tr>
                    <th>
                        Picture
                    </th>
                    <td>
                        <img width="100%"  src="{{asset('public/uploads/news/'.$news->picture)}}" alt="{{$news->title}}">
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection