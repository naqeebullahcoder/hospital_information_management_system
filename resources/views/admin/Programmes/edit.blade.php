@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Create Degree program
    </div>

    <div class="card-body">
        <form action="{{ route("admin.programmes.update",[$program]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
                <label for="department_id">Department</label>

                <select name="department_id" id="department_id" class="form-control select2">
                    @foreach($departments as $id => $department)
                        <option value="{{ $department->id  }}" {{ old('$department', $program->department_id) == $department->id ? 'selected' : '' }}>
                            {{ $department->name }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('department_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('department_id') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.role.fields.permissions_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="name">Degree Name*</label>
                <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', isset($program) ? $program->name : '') }}">
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('program_structure') ? 'has-error' : '' }}">
                <label for="program_structure">Program Structure</label>
                <textarea type="text" rows="1" id="program_structure" name="program_structure" class="form-control" required >{{ old('program_structure',$program->program_structure) }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="name">Duration*</label>
                <input type="text" id="duration" name="duration" class="form-control" required value="{{ old('duration', isset($program) ? $program->duration : '') }}">
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                <label for="no_of_semesters">No of Semesters*</label>
                <input type="number" required id="no_of_semesters" name="no_of_semesters" class="form-control"  value="{{ old('no_of_semesters', isset($program) ? $program->no_of_semesters : '') }}">
                @if($errors->has('code'))
                    <em class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('eligibility_criteria	') ? 'has-error' : '' }}">
                <label for="program_structure">Eligibility Criteria	</label>
                <textarea type="text" rows="1" id="eligibility_criteria" name="eligibility_criteria" class="form-control" required >{{ old('eligibility_criteria',$program->eligibility_criteria) }}</textarea>
                @if($errors->has('eligibility_criteria'))
                    <em class="invalid-feedback">
                        {{ $errors->first('eligibility_criteria') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('degree_completion_requirements') ? 'has-error' : '' }}">
                <label for="degree_completion_requirements">Degree Completion Requirements	</label>
                <textarea type="text" rows="1" id="degree_completion_requirements" name="degree_completion_requirements" class="form-control" required >{{ old('degree_completion_requirements',$program->degree_completion_requirements) }}</textarea>
                @if($errors->has('degree_completion_requirements'))
                    <em class="invalid-feedback">
                        {{ $errors->first('degree_completion_requirements') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.product.fields.name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection