@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Edit Faculty Member
        </div>

        <div class="card-body">
            <form action="{{ route("admin.faculty-members.update",[$faculty_resource]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @if(Illuminate\Support\Facades\Session::get('role')!=1)
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">Name*</label>
                    <input type="text" disabled id="name" name="name" class="form-control" value="{{ old('name', isset($faculty_resource) ? $faculty_resource->user->name : '') }}">
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email*</label>
                    <input type="text" disabled id="email" name="email" class="form-control" value="{{ old('email', isset($faculty_resource) ? $faculty_resource->user->email : '') }}">
                    @if($errors->has('email'))
                        <em class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                @endif
                <input type="text" hidden id="user_id" name="user_id" class="form-control" value="{{ old('user_id', isset($faculty_resource) ? $faculty_resource->user_id : '') }}">
                @if(Illuminate\Support\Facades\Session::get('role')==1)
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="user_id">User*</label>
                    <select name="user_id" id="user_id" class="form-control select2">
                        @foreach(App\User::all() as $id => $user)
                            <option value="{{$user->id}}" {{ old('user_id', $faculty_resource->user_id) == $user->id ? 'selected' : '' }}>
                                {{ $user->name }}- ({{$user->email}})
                            </option>
                        @endforeach
                    </select>
                </div>
                @endif
                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    {{--@if(Illuminate\Support\Facades\Session::get('role')==1)--}}
                        {{--<input type="text" hidden id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($faculty_resource) ? $faculty_resource->qualification : '') }}">--}}
                    {{--@else--}}
                        <label for="qualification">Qualification*</label>
                        <input type="text" id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($faculty_resource) ? $faculty_resource->qualification : '') }}">
                    {{--@endif--}}

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('joining_date') ? 'has-error' : '' }}">

                    <label for="picture">Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', isset($faculty_resource) ? $faculty_resource->dob : '') }}">

                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('joining_date') ? 'has-error' : '' }}">

                        <label for="picture">Joining Date</label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control" value="{{ old('joining_date', isset($faculty_resource) ? $faculty_resource->joining_date : '') }}">

                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('picture') ? 'has-error' : '' }}">

                    {{--@if(Illuminate\Support\Facades\Session::get('role')==1)--}}
                        {{--<input type="file" hidden id="picture" name="picture" class="form-control" value="{{ old('picture', isset($faculty_resource) ? $faculty_resource->picture : '') }}">--}}
                    {{--@else--}}
                        <label for="picture">picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" value="{{ old('picture', isset($faculty_resource) ? $faculty_resource->picture : '') }}">
                    {{--@endif--}}
                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">

                    {{--@if(Illuminate\Support\Facades\Session::get('role')==1)--}}
                        {{--<textarea id="biography" hidden name="biography" class="form-control ">{{ old('biography', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>--}}
                    {{--@else--}}
                        <label for="description">Biography</label>
                        <textarea id="biography" name="biography" class="form-control ">{{ old('biography', isset($faculty_resource) ? $faculty_resource->biography : '') }}</textarea>
                    {{--@endif--}}

                    @if($errors->has('description'))
                        <em class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </em>
                    @endif
                    <p class="helper-block">

                    </p>
                </div>
                <div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <label for="department_id">Department*</label>
                        <select name="department_id" id="department_id" class="form-control select2">
                            @foreach($departments as $id => $department)
                                <option value="{{$department->id}}" {{ old('department_id', $faculty_resource->department_id) == $department->id ? 'selected' : '' }}>
                                    {{ $department->name }}
                                </option>
                            @endforeach
                        </select>

                    @else

                        <input type="text" hidden id="department_id" name="department_id" class="form-control" value="{{ old('department_id', isset($faculty_resource) ? $faculty_resource->department_id : '') }}">

                    @endif


                    @if($errors->has('department_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('department_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <label for="permissions">Designation*</label>
                        <select name="designation_id" id="designation_id" class="form-control select2">

                            @foreach($designations as $id => $designation)
                                <option value="{{$designation->id}}" {{ old('designation_id', $faculty_resource->designation_id) == $designation->id ? 'selected' : '' }}>
                                    {{ $designation->name }}
                                </option>
                            @endforeach
                        </select>

                    @else

                     <input type="text" hidden id="designation_id" name="designation_id" class="form-control" value="{{ old('designation_id', isset($faculty_resource) ? $faculty_resource->designation_id : '') }}">

                     @endif

                    @if($errors->has('designation_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('designation_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">

                    @if(Illuminate\Support\Facades\Session::get('role')==1)
                        <label for="permissions">Type*</label>
                        <select name="faculty_member_type_id" id="faculty_member_type_id" class="form-control select2">
                            @foreach($faculty_member_types as $id => $faculty_member_type)
                                <option value="{{$faculty_member_type->id}}" {{ old('faculty_member_type_id', $faculty_resource->faculty_member_type_id) == $faculty_member_type->id ? 'selected' : '' }}>
                                    {{ $faculty_member_type->name }}
                                </option>
                            @endforeach
                        </select>

                    @else

                    <input type="text" hidden id="faculty_member_type_id" name="faculty_member_type_id" class="form-control" value="{{ old('faculty_member_type_id', isset($faculty_resource) ? $faculty_resource->faculty_member_type_id : '') }}">

                    @endif

                </div>


                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    <label for="qualification">CNIC</label>
                    <input type="text" id="cnic" name="cnic" class="form-control" value="{{ old('cnic', isset($faculty_resource) ? $faculty_resource->cnic : '') }}">

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    <label for="qualification">License No</label>
                    <input type="text" id="license_no" name="license_no" class="form-control" value="{{ old('license_no', isset($faculty_resource) ? $faculty_resource->license_no : '') }}">

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    <label for="qualification">Specialization</label>
                    <input type="text" id="specialization" name="specialization" class="form-control" value="{{ old('specialization', isset($faculty_resource) ? $faculty_resource->specialization : '') }}">

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>

                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    <label for="qualification">Mobile No</label>
                    <input type="text" id="mobile_no" name="mobile_no" class="form-control" value="{{ old('mobile_no', isset($faculty_resource) ? $faculty_resource->mobile_no : '') }}">

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    <label for="qualification">Phone No</label>
                    <input type="text" id="phone_no" name="phone_no" class="form-control" value="{{ old('phone_no', isset($faculty_resource) ? $faculty_resource->phone_no : '') }}">

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    <label for="qualification">Fee</label>
                    <input type="number" id="fee" name="fee" class="form-control" value="{{ old('fee', isset($faculty_resource) ? $faculty_resource->fee : '') }}">

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>


                <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">

                    <label for="qualification">Address</label>
                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address', isset($faculty_resource) ? $faculty_resource->address : '') }}">

                    @if($errors->has('qualification'))
                        <em class="invalid-feedback">
                            {{ $errors->first('qualification') }}
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
