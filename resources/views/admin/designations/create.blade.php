@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Create Designation
    </div>

    <div class="card-body">
        <form action="{{ route("admin.designations.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                <label for="name">Designation *</label>
                <input type="text" required id="name" name="name" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}">
                @if($errors->has('title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.permission.fields.title_helper') }}
                </p>
            </div>
            {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                {{--<label for="name">Priority *</label>--}}
                {{--<input type="number" required id="priority" name="priority" class="form-control" value="{{ old('title', isset($permission) ? $permission->title : '') }}">--}}
                {{--@if($errors->has('title'))--}}
                    {{--<em class="invalid-feedback">--}}
                        {{--{{ $errors->first('title') }}--}}
                    {{--</em>--}}
                {{--@endif--}}
                {{--<p class="helper-block">--}}
                    {{--{{ trans('global.permission.fields.title_helper') }}--}}
                {{--</p>--}}
            {{--</div>--}}
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection