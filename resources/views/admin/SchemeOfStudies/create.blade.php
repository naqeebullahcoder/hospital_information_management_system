@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Create Scheme of {{$program->name}}
        </div>

        <div class="card-body">
            <form action="{{ route("admin.scheme-of-studies.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group {{ $errors->has('semester') ? 'has-error' : '' }}">
                    <label for="course_id">Semester*</label>

                    <select name="semester" id="semester" class="form-control select2">

                        @for( $index=1; $index <=$program->no_of_semesters; $index ++)
                            <option value="{{$index}}" >
                                {{$index}}
                            </option>
                        @endfor
                    </select>
                    @if($errors->has('semester'))
                        <em class="invalid-feedback">
                            {{ $errors->first('semester') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('course_id') ? 'has-error' : '' }}">
                    <label for="course_id">Course*</label>

                    <select name="course_id" id="course_id" class="form-control select2">
                        @foreach($courses as $id => $course)
                            <option value="{{ $course->id }}" {{ old('course_id', isset($course) ? $course->title : '') }}>
                                {{ $course->title }}-({{ $course->code}})
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('course_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('course_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('course_credit_hours') ? 'has-error' : '' }}">
                <label for="course_credit_hours">Course Credit Hours*</label>
                <input type="number" required id="course_credit_hours" name="course_credit_hours" class="form-control" value="{{ old('course_credit_hours') }}">
                @if($errors->has('course_credit_hours'))
                <em class="invalid-feedback">
                {{ $errors->first('course_credit_hours') }}
                </em>
                @endif
                <p class="helper-block">
                {{ trans('global.product.fields.name_helper') }}
                </p>
                </div>

                <div class="form-group {{ $errors->has('lab_credit_hours') ? 'has-error' : '' }}">
                    <label for="lab_credit_hours">Lab Credit Hours*</label>
                    <input type="number" required id="lab_credit_hours" name="lab_credit_hours" class="form-control" value="{{ old('lab_credit_hours') }}">
                    @if($errors->has('lab_credit_hours'))
                        <em class="invalid-feedback">
                            {{ $errors->first('lab_credit_hours') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <input type="number" hidden required id="program_id" name="program_id" class="form-control" value="{{ $program->id }}">


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection
