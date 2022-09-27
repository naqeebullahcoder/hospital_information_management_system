@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Department
    </div>

    <div class="card-body">
        <form action="{{ route("admin.departments.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('chairman') ? 'has-error' : '' }}">
                <label for="parent_id">Parent Department </label>

                <select name="parent_id" id="parent_id" class="form-control select2">
                    <option value="">Select Department</option>
                    @foreach($departments  as $id => $department)
                        <option value="{{ $department->id }}" {{ old('parent_id', isset($department) ? $department->name : '') }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('parent_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('parent_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>
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
            <div class="form-group {{ $errors->has('vision') ? 'has-error' : '' }}">
                <label for="vision">Vision</label>
                <textarea id="vision" name="vision" class="form-control ">{{ old('vision', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>
                @if($errors->has('vision'))
                    <em class="invalid-feedback">
                        {{ $errors->first('vision') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('vision') ? 'has-error' : '' }}">
                <label for="mission">Mission</label>
                <textarea id="mission" name="mission" class="form-control ">{{ old('mission', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>
                @if($errors->has('mission'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mission') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>
            <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                <label for="picture">Department Picture</label>
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
            <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">
                <label for="picture">Department Thumbnail</label>
                <input type="file" id="thumbnail" name="thumbnail" class="form-control" value="{{ old('thumbnail', isset($faculty_resource) ? $faculty_resource->picture : '') }}">
                @if($errors->has('thumbnail'))
                    <em class="invalid-feedback">
                        {{ $errors->first('thumbnail') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('chairman') ? 'has-error' : '' }}">
                <label for="faculty_member_id">HOD </label>

                <select name="	hod_id" id="hod_id" class="form-control select2">
                    <option value="">Select Faculty Member</option>
                    @foreach($faculty_members  as $id => $member)
                        <option value="{{ $member->id }}" {{ old('chairman', isset($member) ? $member->name : '') }}>
                            {{ $member->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('chairman'))
                    <em class="invalid-feedback">
                        {{ $errors->first('chairman') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('introduction') ? 'has-error' : '' }}">
                <label for="hod_message">HOD Message</label>
                <textarea id="hod_message" name="hod_message" class="form-control ">{{ old('hod_message', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>
                @if($errors->has('hod_message'))
                    <em class="invalid-feedback">
                        {{ $errors->first('hod_message') }}
                    </em>
                @endif
                <p class="helper-block">

                </p>
            </div>

            <div class="form-group {{ $errors->has('contact_person_name') ? 'has-error' : '' }}">
                <label for="name">Contact Person Name</label>
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
{{--    </div>--}}
</div>

@endsection
