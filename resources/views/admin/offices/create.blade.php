@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Office
    </div>

    <div class="card-body">
        <form action="{{ route("admin.offices.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Name *</label>
                <input type="text"  id="name"  name="name" class="form-control" required value="{{ old('title', isset($permission) ? $permission->title : '') }}">
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
                <textarea id="introduction" name="introduction" class="form-control ">{{ old('introduction', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>
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
                <input type="file" id="picture" name="picture" class="form-control" value="{{ old('picture', isset($faculty_resource) ? $faculty_resource->picture : '') }}">
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
                <textarea id="director_message" name="director_message" class="form-control ">{{ old('director_message', isset($faculty_resource) ? $faculty_resource->director_message : '') }}</textarea>
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
                    {{--@foreach($staff_members  as $id => $staff_member)--}}
                        {{--<option value="{{ $staff_member->id }}" {{ old('director_id', isset($staff_member) ? $staff_member->user->name : '') }}>--}}
                            {{--{{ $staff_member->user->name }}--}}
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
                <input type="text"  id="contact_person_name"  name="contact_person_name" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}">
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
                <input type="text"  id="contact_person_email"  name="contact_person_email" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}">
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
                <input type="text"  id="contact_person_number"  name="contact_person_number" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}">
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

@endsection