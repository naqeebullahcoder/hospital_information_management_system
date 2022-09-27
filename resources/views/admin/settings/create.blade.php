@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Settings
        </div>

        <div class="card-body">
            <form action="{{ route("admin.setting.store",[$setting]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Company Name</label>
                    <input type="text" id="company_name" name="company_name" class="form-control" required value="{{ old('company_name', isset($setting) ? $setting->name : '') }}">
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
                    <input type="text" id="primary_color" name="primary_color" class="form-control"  value="{{ old('primary_color', isset($setting) ? $setting->primary_color : '') }}">
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
                    <input type="text" id="secondary_color" name="secondary_color" class="form-control"  value="{{ old('secondary_color', isset($setting) ? $setting->secondary_color : '') }}">
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
                <label for="title">Logo</label>
                <input type="text" id="picture" name="picture" class="form-control"  value="{{ old('picture', isset($setting) ? $setting->picture : '') }}">
                @if($errors->has('title'))
                <em class="invalid-feedback">
                {{ $errors->first('title') }}
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