@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Services Details
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
            <tr>
                    <th>
                        Services Name
                    </th>
                    <td>
                        {{ $service->name}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Charges
                    </th>
                    <td>
                        {{ $service->charges}}
                    </td>
                </tr>

                {{--<tr>--}}
                    {{--<th>--}}
                        {{--Departments--}}
                    {{--</th>--}}
                    {{--<td>--}}
                        {{--{{ $service->departments}}--}}
                    {{--</td>--}}
                {{--</tr>--}}

            </tbody>
        </table>
    </div>
</div>

@endsection