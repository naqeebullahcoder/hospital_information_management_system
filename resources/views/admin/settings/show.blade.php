@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Settings Details
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <tbody>
                <tr>
                    <th>
                        Company Name
                    </th>
                    <td>
                        {{ $settings->company_name}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Primary Color
                    </th>
                    <td>
                        {{ $setting->primary_color}}
                    </td>
                </tr>
                <tr>
                    <th>
                        Secondary Color
                    </th>
                    <td>
                        {{ $setting->secondary_color}}
                    </td>
                </tr>

                <tr>
                    <th>
                        Logo
                    </th>
                    <td>
                        {{ $setting->logo}}
                    </td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection