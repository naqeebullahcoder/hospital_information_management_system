@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Job
        </div>

        <div class="card-body">
            <form action="{{ route("admin.jobs.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Job Title*</label>
                    <input type="text" id="title" name="title" class="form-control" required value="{{ old('title', isset($jobs) ? $jobs->title : '') }}">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                    <label for="type">Job Type*</label>

                    <select name="type" id="type" class="form-control select2">
                        @foreach($job_types as $job_type)
                            <option value="{{$job_type->id}}" >
                                {{$job_type->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('type'))
                        <em class="invalid-feedback">
                            {{ $errors->first('type') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('file') ? 'has-error' : '' }}">
                    <label for="picture">File</label>
                    <input type="file" rows="2" id="file" name="file" class="form-control" value="{{ old('file', isset($jobs) ? $jobs->file : '') }}">
                    @if($errors->has('file'))
                        <em class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('opening_date') ? 'has-error' : '' }}">
                    <label for="title">Opening Date*</label>
                    <input type="date" id="opening_date" name="opening_date" class="form-control"  value="{{ old('opening_date', isset($jobs) ? $jobs->opening_date : '') }}">
                    @if($errors->has('opening_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('opening_date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('closing_date') ? 'has-error' : '' }}">
                    <label for="closing_date">Closing Date</label>
                    <input type="date" id="closing_date" name="closing_date" class="form-control"  value="{{ old('closing_date', isset($jobs) ? $jobs->closing_date : '') }}">
                    @if($errors->has('closing_date'))
                        <em class="invalid-feedback">
                            {{ $errors->first('closing_date') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                    <label for="status">Active Status*</label>

                    <select name="status" id="status" class="form-control select2">
                        @foreach($status as $active_status)
                            <option value="{{$active_status->id}}" >
                                {{$active_status->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_category_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('status') }}
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