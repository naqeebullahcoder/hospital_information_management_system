@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Edit Office
    </div>

    <div class="card-body">
        <form action="{{ route("admin.offices.update",[$office_data]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Name *</label>
                <input type="text"  id="name"  name="name" class="form-control" required value="{{ old('title', isset($office_data) ? $office_data->name : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('introduction') ? 'has-error' : '' }}">
                <label for="introduction">Introduction</label>
                <textarea id="introduction" name="introduction" class="form-control ">{{ old('introduction', isset($office_data) ? $office_data->introduction : '') }}</textarea>
                @if($errors->has('introduction'))
                    <em class="invalid-feedback">
                        {{ $errors->first('introduction') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                <label for="picture">Office Picture</label>
                <input type="file" id="picture" name="picture" class="form-control" value="{{ old('picture', isset($office_data) ? $office_data->picture : '') }}">
                @if($errors->has('picture'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('introduction') ? 'has-error' : '' }}">
                <label for="introduction">Director Message</label>
                <textarea id="director_message" name="director_message" class="form-control ">{{ old('director_message', isset($office_data) ? $office_data->director_message : '') }}</textarea>
                @if($errors->has('introduction'))
                    <em class="invalid-feedback">
                        {{ $errors->first('introduction') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            {{--<div class="form-group {{ $errors->has('chairman') ? 'has-error' : '' }}">--}}
                {{--<label for="faculty_member_id">Director </label>--}}

                {{--<select name="director_id" id="director_id" class="form-control select2">--}}
                    {{--<option value="">Select Staff Member</option>--}}
                    {{--@foreach($staff_members  as $id => $member)--}}
                        {{--<option value="{{$member->id}}" {{ old('director_id', $office_data->director_id) == $member->id ? 'selected' : '' }}>--}}
                            {{--{{ $member->user->name }}--}}
                        {{--</option>--}}
                    {{--@endforeach--}}
                {{--</select>--}}
                {{--@if($errors->has('director_id'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('director_id') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.role.fields.permissions_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}

            <div class="form-group {{ $errors->has('contact_person_name') ? 'has-error' : '' }}">
                <label for="name">Contact  Person Name</label>
                <input type="text"  id="contact_person_name"  name="contact_person_name" class="form-control" value="{{ old('title', isset($office_data) ? $office_data->contact_person_name : '') }}">
                @if($errors->has('contact_person_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('contact_person_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('contact_person_email') ? 'has-error' : '' }}">
                <label for="name">Contact Person Email</label>
                <input type="text"  id="contact_person_email"  name="contact_person_email" class="form-control" value="{{ old('title', isset($office_data) ? $office_data->contact_person_email : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Contact Person Phone Number</label>
                <input type="text"  id="contact_person_number"  name="contact_person_number" class="form-control" value="{{ old('title', isset($office_data) ? $office_data->contact_person_number : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>


    <div class="card">
        <div class="card-header">
            Projects
        </div>

        <div class="card-body">
            @if(isset($office_project))
                <form action="{{ route("admin.office-projects.update",[$office_project->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @else
                        <form action="{{ route("admin.office-projects.store") }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @endif

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                <label for="picture">Name*</label>
                                <input type="text" id="name" name="name" required class="form-control" value="{{ old('name', isset($office_project) ? $office_project->name : '') }}">

                                @if($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('priority') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                <label for="picture">Description*</label>
                                <input type="text" id="description" name="description" required class="form-control" value="{{ old('description', isset($office_project) ? $office_project->description : '') }}">

                                @if($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('priority') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                <label for="picture">Start Date</label>
                                <input type="date" id="start_date" name="start_date"  class="form-control" value="{{ old('start_date', isset($office_project) ? $office_project->start_date : '') }}">

                                @if($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('priority') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>

                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                                <label for="picture">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', isset($office_project) ? $office_project->end_date : '') }}">

                                @if($errors->has('name'))
                                    <em class="invalid-feedback">
                                        {{ $errors->first('priority') }}
                                    </em>
                                @endif
                                <p class="helper-block">
                                    {{ trans('global.product.fields.name_helper') }}
                                </p>
                            </div>
                            <input type="hidden" id="office_id" name="office_id" value="{{ old('year', isset($office_data) ? $office_data->id : '') }}">

                            <div>
                                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                            </div>
                        </form>
                        <br/>
                        <div >
                            <h4>Office projects</h4>
                        </div>

                        <table class="table table-bordered table-striped">
                            <tbody>

                            @foreach($office_data->office_projects as $key=> $office_project)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$office_project->name}}
                                    </td>
                                    <td>
                                        {{$office_project->description}}
                                    </td>
                                    <td>
                                        {{$office_project->start_date}}
                                    </td>
                                    <td>
                                        {{$office_project->end_date}}
                                    </td>
                                    <td>
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.office-projects.edit', $office_project->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                        <form action=" {{ route('admin.office-projects.destroy', $office_project->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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


@endsection