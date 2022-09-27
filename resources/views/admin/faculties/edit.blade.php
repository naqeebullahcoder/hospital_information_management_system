@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Update Faculties
    </div>

    <div class="card-body">
        <form action="{{ route("admin.faculties.update",[$faculty]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('title', isset($faculty) ? $faculty->name : '') }}">
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
                <textarea id="introduction" name="introduction" class="form-control ">{{ old('introduction', isset($faculty) ? $faculty->introduction : '') }}</textarea>
                @if($errors->has('introduction'))
                    <em class="invalid-feedback">
                        {{ $errors->first('introduction') }}
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

            <div class="form-group {{ $errors->has('chairman') ? 'has-error' : '' }}">
                <label for="faculty_member_id">chairman </label>

                <select name="chairman" id="chairman" class="form-control select2">
                    @foreach(App\FacultyMembers::all()  as $id => $member)
                        <option value="{{$member->id}}" {{ old('chairman', $faculty->chairman) == $member->id ? 'selected' : '' }}>
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

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Priority *</label>
                <input type="number" id="priority" name="priority" required class="form-control" value="{{ old('title', isset($faculty) ? $faculty->priority : '') }}">
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