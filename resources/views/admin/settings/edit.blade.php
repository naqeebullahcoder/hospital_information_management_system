@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Settings
        </div>

        <div class="card-body">
            <form action="{{ route("admin.settings.update",[$settings]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Company Name</label>

                    <input type="text" id="company_name" name="company_name" class="form-control" required value="{{ old('company_name', isset($settings) ? $settings->company_name : '') }}">
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
                    <label for="title">Primary Color</label>

                    <input type="color" id="primary_color" name="primary_color" class="form-control" style="color: {{\App\Setting::first()->primary_color}} !importent"  value="{{ old('primary_color', isset($settings) ? $settings->primary_color : '') }}">
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
                    <label for="title">Secondary Color</label>
                    <input type="color" id="secondary_color" name="secondary_color" class="form-control"  value="{{ old('secondary_color', isset($settings) ? $settings->secondary_color : '') }}">
                    @if($errors->has('title'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                    <label for="logo">Logo</label>
                    <input type="file" rows="2" id="logo" name="logo[]" class="form-control" value="{{ old('logo', isset($settings) ? $settings->logo : '') }}" multiple>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('logo') }}
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