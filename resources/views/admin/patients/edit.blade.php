@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Patients
        </div>

        <div class="card-body">
            <form action="{{ route("admin.patients.update",[$patients]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">Name</label>
                    <input type="text" id="name" name="name" class="form-control" required value="{{ old('name', isset($patients) ? $patients->name : '') }}">
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
                    <label for="title">Mobile #</label>
                    <input type="text" id="mobile_no" name="mobile_no" class="form-control"  value="{{ old('mobile_no', isset($patients) ? $patients->mobile_no : '') }}">
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
                    <input type="text" id="cnic" name="cnic" class="form-control"  value="{{ old('cnic', isset($patients) ? $patients->cnic : '') }}">
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
                    <label for="title">Gender</label>
                    <select  id="gender" name="gender" class="form-control select2" >
                        <option value="Male" {{ old('gender', $patients->gender) == 'Male' ? 'selected' : '' }}> Male</option>
                        <option value="Female" {{ old('gender', $patients->gender) == 'Female' ? 'selected' : '' }} > Female</option>
                    </select>
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
                    <label for="title">Date of Birth</label>
                    <input type="number" id="dob" name="dob" class="form-control" value="{{ old('dob', isset($patients) ? $patients->dob : '') }}">
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
                    <label for="title">Marital Status</label>
                    <input type="text" id="marital_status" name="marital_status" class="form-control"  value="{{ old('marital_status', isset($patients) ? $patients->marital_status : '') }}">
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
                    <label for="title">City</label>
                    <input type="text" id="city" name="city" class="form-control"  value="{{ old('city', isset($patients) ? $patients->city : '') }}">
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
                    <label for="title">Monthly Income</label>
                    <input type="number" id="monthly_income" name="monthly_income" class="form-control"  value="{{ old('monthly_income', isset($patients) ? $patients->monthly_income : '') }}">
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
                    <label for="title">Street Address</label>
                    <textarea type="text" id="street_address" name="street_address" class="form-control" >{{ old('street_address', isset($patients) ? $patients->street_address : '') }}</textarea>
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
