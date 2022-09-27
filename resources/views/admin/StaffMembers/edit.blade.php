@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Staff Member
        </div>

        <div class="card-body">
            <form action="{{ route("admin.staff-members.update",[$staff_member]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{--@if(Illuminate\Support\Facades\Session::get('role')!=1)--}}
                {{--<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">--}}
                    {{--<label for="name">Name*</label>--}}
                    {{--<input type="text" disabled id="name" name="name" class="form-control" value="{{ old('name', isset($staff_member) ? $staff_member->user->name : '') }}">--}}
                    {{--@if($errors->has('name'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('name') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.product.fields.name_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}

                {{--@if(Illuminate\Support\Facades\Session::get('role')==1)--}}
                {{--<input type="text" hidden id="user_id" name="user_id" class="form-control" value="{{ old('user_id', isset($staff_member) ? $staff_member->user_id : '') }}">--}}
                @if(Illuminate\Support\Facades\Session::get('role')==1)
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="user_id">User*</label>
                    <select name="user_id" id="user_id" class="form-control select2">
                        @foreach(App\User::all() as $id => $user)
                            <option value="{{$user->id}}" {{ old('user_id', $staff_member->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}- ({{$user->email}})
                            </option>
                        @endforeach
                    </select>
                </div>
                @else
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                    <label for="picture">Name*</label>
                    <input type="text" id="name" name="name" required class="form-control" value="{{ old('name', isset($staff_member) ? $staff_member->name : '') }}">

                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                @endif
                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <input type="text" hidden id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($staff_member) ? $staff_member->qualification : '') }}">
                    @else
                        <label for="qualification">Qualification</label>
                        <input type="text" id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($staff_member) ? $staff_member->qualification : '') }}">
                    @endif

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('joining_date') ? 'has-error' : '' }}">

                        <label for="picture">Joining Date</label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control" value="{{ old('joining_date', isset($staff_member) ? $staff_member->joining_date : '') }}">

                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <input type="file" hidden id="picture" name="picture" class="form-control" value="{{ old('picture', isset($staff_member) ? $staff_member->picture : '') }}">
                    @else
                        <label for="picture">picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" value="{{ old('picture', isset($staff_member) ? $staff_member->picture : '') }}">
                    @endif
                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <textarea id="biography" hidden name="biography" class="form-control ">{{ old('biography', isset($staff_member) ? $staff_member->biography : '') }}</textarea>
                    @else
                        <label for="description">Biography</label>
                        <textarea id="biography" name="biography" class="form-control ">{{ old('biography', isset($staff_member) ? $staff_member->biography : '') }}</textarea>
                    @endif

                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">

                    </p>
                </div>
                {{--<div class="form-group {{ $errors->has('office_id') ? 'has-error' : '' }}">--}}

                    {{--@if(Illuminate\Support\Facades\Session::get('role')==1)--}}
                        {{--<label for="office_id">Offices*</label>--}}
                        {{--<select name="office_id" id="office_id" class="form-control select2">--}}
                            {{--@foreach($offices as $id => $office)--}}
                                {{--<option value="{{$office->id}}" {{ old('office_id', $staff_member->office_id) == $office->id ? 'selected' : '' }}>--}}
                                    {{--{{ $office->name }}--}}
                                {{--</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}

                    {{--@else--}}

                        {{--<input type="text" hidden id="office_id" name="office_id" class="form-control" value="{{ old('office_id', isset($staff_member) ? $staff_member->office_id : '') }}">--}}
                        {{--<input type="hidden" id="staff_members_id" name="staff_members_id" value="{{ old('year', isset($staff_member) ? $staff_member->id : '') }}">--}}

                    {{--@endif--}}


                    {{--@if($errors->has('department_id'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('department_id') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}
                {{--<div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">--}}

                    {{--@if(Illuminate\Support\Facades\Session::get('role')==1)--}}
                        {{--<label for="permissions">Designation*</label>--}}
                        {{--<select name="designation_id" id="designation_id" class="form-control select2">--}}

                            {{--@foreach($designations as $id => $designation)--}}
                                {{--<option value="{{$designation->id}}" {{ old('designation_id', $staff_member->designation_id) == $designation->id ? 'selected' : '' }}>--}}
                                    {{--{{ $designation->name }}--}}
                                {{--</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}

                    {{--@else--}}

                     {{--<input type="text" hidden id="designation_id" name="designation_id" class="form-control" value="{{ old('designation_id', isset($staff_member) ? $staff_member->designation_id : '') }}">--}}

                     {{--@endif--}}

                    {{--@if($errors->has('designation_id'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('designation_id') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

    @if(Illuminate\Support\Facades\Session::get('role')==1)
        <div class="card">
            <div class="card-header">
                Staff Member Job Responsibilities
            </div>

            <div class="card-body">
                @if(isset($job_responsibility))
                    <form action="{{ route("admin.staff-job-responsibilities.update",[$job_responsibility->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @else
                            <form action="{{ route("admin.staff-job-responsibilities.store") }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                @endif


                                <div class="form-group {{ $errors->has('office_id') ? 'has-error' : '' }}">
                                    <label for="office_id">Office*</label>

                                    <select name="office_id" id="office_id" class="form-control select2">
                                        @foreach($offices as $id => $office)
                                        @if(isset($job_responsibility))
                                            <option value="{{$office->id}}" {{ old('office_id', $job_responsibility->office_id) == $office->id ? 'selected' : '' }}>
                                        @else
                                            <option value="{{$office->id}}" >
                                        @endif
                                            {{ $office->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('office_id'))
                                    <em class="invalid-feedback">
                                    {{ $errors->first('office_id') }}
                                    </em>
                                    @endif
                                    <p class="helper-block">
                                    {{ trans('global.role.fields.permissions_helper') }}
                                    </p>
                                </div>
                                <div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">
                                    <label for="permissions">Designation*</label>

                                    <select name="designation_id" id="designation_id" class="form-control select2">
                                        @foreach($designations as $id => $designation)
                                        @if(isset($job_responsibility))
                                             <option value="{{$designation->id}}" {{ old('designation_id', $job_responsibility->designation_id) == $designation->id ? 'selected' : '' }}>
                                        @else
                                                <option value="{{$designation->id}}" >
                                         @endif
                                         {{ $designation->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('designation_id'))
                                    <em class="invalid-feedback">
                                    {{ $errors->first('designation_id') }}
                                    </em>
                                    @endif
                                    <p class="helper-block">
                                    {{ trans('global.role.fields.permissions_helper') }}
                                    </p>
                                </div>
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                    <label for="picture">Priority*</label>
                                    <input type="number" id="priority" name="priority" required class="form-control" value="{{ old('name', isset($job_responsibility) ? $job_responsibility->priority : '') }}">

                                    @if($errors->has('priority'))
                                        <em class="invalid-feedback">
                                            {{ $errors->first('priority') }}
                                        </em>
                                    @endif
                                    <p class="helper-block">
                                        {{ trans('global.product.fields.name_helper') }}
                                    </p>
                                </div>
                                <input type="hidden" id="staff_member_id" name="staff_member_id" value="{{ old('year', isset($staff_member) ? $staff_member->id : '') }}">

                                <div>
                                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                                </div>
                            </form>
                            <br/>
                            <div >
                                <h4>JOB RESPONSIBILITIES</h4>
                            </div>

                            <table class="table table-bordered table-striped">
                                <tbody>

                                @foreach($staff_member->staff_member_job_responsibilities as $key=> $staff_member_job_responsibilities)
                                    <tr>
                                        <td>
                                            {{$key+1}}
                                        </td>
                                        <td>
                                            {{$staff_member_job_responsibilities->office->name}}
                                        </td>
                                        <td>
                                            {{$staff_member_job_responsibilities->designation->name}}
                                        </td>
                                        <td>
                                            {{$staff_member_job_responsibilities->priority}}
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.staff-job-responsibilities.edit', $staff_member_job_responsibilities->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                            <form action=" {{ route('admin.staff-job-responsibilities.destroy', $staff_member_job_responsibilities->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


            </div>
        </div>
    @endif

@endsection
