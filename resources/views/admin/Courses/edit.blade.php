@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Update Course
    </div>

    <div class="card-body">
        <form action="{{ route("admin.courses.update",[$course]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="name">Course code*</label>
                <input type="text" id="code" name="code" class="form-control" required value="{{ old('code', isset($course) ? $course->code : '') }}">
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="title">Course title*</label>
                <input type="text" id="title" name="title" class="form-control" required value="{{ old('title', isset($course) ? $course->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('course_category_id') ? 'has-error' : '' }}">
                <label for="course_category_id">Course Category*</label>

                <select name="course_category_id" id="course_category_id" class="form-control select2">
                    @foreach($course_categories as $id => $course_category)
                        <option value="{{ $course_category->id  }}" {{ old('course_category_id', $course->course_category_id) == $course_category->id ? 'selected' : '' }}>
                            {{ $course_category->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('course_category_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('course_category_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection