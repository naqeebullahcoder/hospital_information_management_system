@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Services
        </div>

        <div class="card-body">
            <form action="{{ route("admin.services.update",[$services]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', isset($services) ? $services->name : '') }}">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Charges</label>
                    <input type="number" id="charges" name="charges" class="form-control"  value="{{ old('charges', isset($services) ? $services->charges : '') }}">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                {{--<div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}
                    {{--<label for="title">Departments</label>--}}
                    {{--<input type="text" id="departments" name="departments" class="form-control" value="{{ old('departments', isset($services) ? $services->departments : '') }}">--}}
                    {{--@if($errors->has('title'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('title') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.product.fields.name_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}

                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>

@endsection