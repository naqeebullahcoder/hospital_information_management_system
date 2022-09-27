@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Doctor
        </div>

        <div class="card-body">
            <form action="{{ route("admin.doctors.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', isset($doctors) ? $doctors->name : '') }}">
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
                    <label for="title">CNIC</label>
                    <input type="text" id="cnic" name="cnic" class="form-control"  value="{{ old('cnic', isset($doctors) ? $doctors->cnic : '') }}">
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
                    <label for="title">Qualification</label>
                    <input type="text" id="qualification" name="qualification" class="form-control"  value="{{ old('qualification', isset($doctors) ? $doctors->qualification : '') }}">
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
                    <label for="title">License #</label>
                    <input type="text" id="license_no" name="license_no" class="form-control" value="{{ old('license_no', isset($doctors) ? $doctors->license_no : '') }}">
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
                    <label for="title">Specialization</label>
                    <input type="text" id="specialization" name="specialization" class="form-control"  value="{{ old('specialization', isset($doctors) ? $doctors->specialization : '') }}">
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
                    {{--<label for="title">Picture</label>--}}
                    {{--<input type="text" id="picture" name="picture" class="form-control"  value="{{ old('picture', isset($product) ? $product->name : '') }}">--}}
                    {{--@if($errors->has('title'))--}}
                        {{--<em class="invalid-feedback">--}}
                            {{--{{ $errors->first('title') }}--}}
                        {{--</em>--}}
                    {{--@endif--}}
                    {{--<p class="helper-block">--}}
                        {{--{{ trans('global.product.fields.name_helper') }}--}}
                    {{--</p>--}}
                {{--</div>--}}

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Mobile #</label>
                    <input type="number" id="mobile_no" name="mobile_no" class="form-control"  value="{{ old('mobile_no', isset($doctors) ? $doctors->mobile_no : '') }}">
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
                    <label for="title">Phone #</label>
                    <input type="number" id="phone_no" name="phone_no" class="form-control" value="{{ old('phone_no', isset($doctors) ? $product->phone_no : '') }}"></input>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Fee</label>
                    <input type="text" id="fee" name="fee" class="form-control" value="{{ old('fee', isset($doctors) ? $doctors->fee : '') }}"></input>
                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                    <label for="title">Address</label>
                    <textarea type="text-area" id="address" name="address" class="form-control" value="{{ old('address', isset($doctors) ? $doctors->address : '') }}"></textarea>
                    @if($errors->has('description'))
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