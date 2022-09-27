@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            Add Staff Member (New Member)
        </div>

        <div class="card-body">
            <form action="{{ route("admin.staff-members.store") }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(Illuminate\Support\Facades\Session::get('role')==1)
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="user_id">User*</label>
                        <select name="user_id" id="user_id" class="form-control select2">
                            @foreach(App\User::all() as $id => $user)
                                <option value="{{ $user->id }}" {{ old('email', isset($faculty_member_type) ? $faculty_member_type->user_id : '') }}>
                                    {{ $user->name }}- ({{$user->email}})
                                </option>
                            @endforeach
                        </select>
                    </div>
               @else
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                    <label for="picture">Name*</label>
                    <input type="text" id="name" name="name" required class="form-control" value="{{ old('name', isset($staff_member) ? $staff_member->name : '') }}">

                    @if($errors->has('picture'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.product.fields.name_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                        <label for="picture">Email*</label>
                        <input type="text" id="email" name="email" required class="form-control" value="{{ old('email', isset($staff_member) ? $staff_member->email : '') }}">

                        @if($errors->has('picture'))
                            <em class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.product.fields.name_helper') }}
                        </p>
                 </div>
                    <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">


                            <label for="qualification">Qualification</label>
                            <input type="text" id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($staff_member) ? $staff_member->qualification : '') }}">
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

                        <label for="picture">Joining Date</label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control" value="{{ old('joining_date', isset($staff_member) ? $staff_member->joining_date : '') }}">

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
                            <label for="picture">picture</label>
                            <input type="file" id="picture" name="picture" class="form-control" value="{{ old('picture', isset($staff_member) ? $staff_member->picture : '') }}">
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
                            <label for="description">Biography</label>
                            <textarea id="biography" name="biography" class="form-control ">{{ old('biography', isset($staff_member) ? $staff_member->biography : '') }}</textarea>
                        @if($errors->has('description'))
                            <em class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>


                <div class="form-group {{ $errors->has('office_id') ? 'has-error' : '' }}">
                    <label for="office_id">Office*</label>

                    <select name="office_id" id="office_id" class="form-control select2">
                        @foreach($offices as $id => $office)
                            <option value="{{ $office->id }}" {{ old('office_id', isset($office) ? $office->name : '') }}>
                                {{ $office->name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('office_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('office_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">
                    <label for="permissions">Designation*</label>

                    <select name="designation_id" id="designation_id" class="form-control select2">
                        @foreach($designations as $id => $designation)
                            <option value="{{ $designation->id }}" {{ old('designation_id', isset($designation) ? $designation->name : '') }}>
                                {{ $designation->name }}
                            </option>
                        @endforeach
                    </select>
                    @if($errors->has('designation_id'))
                        <em class="invalid-feedback">
                            {{ $errors->first('designation_id') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.role.fields.permissions_helper') }}
                    </p>
                </div>
                @endif
                <input type="hidden" id="faculty_member_type_id" name="faculty_member_type_id" value="1">


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    @if(Illuminate\Support\Facades\Session::get('role')!=1)
    <div class="card">
        <div class="card-header">
            Add Staff Member (Existing Users)
        </div>

        <div class="card-body">
            <form action="{{ route("admin.staff-members.store") }}" method="POST" enctype="multipart/form-data">
                @csrf

                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="user_id">User*</label>
                        <select name="user_id" id="user_id" class="form-control select2">
                            @foreach(App\User::all() as $id => $user)
                                <option value="{{ $user->id }}" {{ old('email', isset($faculty_member_type) ? $faculty_member_type->user_id : '') }}>
                                    {{ $user->name }}- ({{$user->email}})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group {{ $errors->has('qualification') ? 'has-error' : '' }}">


                        <label for="qualification">Qualification</label>
                        <input type="text" id="qualification" name="qualification" class="form-control" value="{{ old('qualification', isset($staff_member) ? $staff_member->qualification : '') }}">
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

                        <label for="picture">Joining Date</label>
                        <input type="date" id="joining_date" name="joining_date" class="form-control" value="{{ old('joining_date', isset($staff_member) ? $staff_member->joining_date : '') }}">

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
                        <label for="picture">picture</label>
                        <input type="file" id="picture" name="picture" class="form-control" value="{{ old('picture', isset($staff_member) ? $staff_member->picture : '') }}">
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
                        <label for="description">Biography</label>
                        <textarea id="biography" name="biography" class="form-control ">{{ old('biography', isset($staff_member) ? $staff_member->biography : '') }}</textarea>
                        @if($errors->has('description'))
                            <em class="invalid-feedback">
                                {{ $errors->first('description') }}
                            </em>
                        @endif
                        <p class="helper-block">

                        </p>
                    </div>


                    <div class="form-group {{ $errors->has('office_id') ? 'has-error' : '' }}">
                        <label for="office_id">Office*</label>

                        <select name="office_id" id="office_id" class="form-control select2">
                            @foreach($offices as $id => $office)
                                <option value="{{ $office->id }}" {{ old('office_id', isset($office) ? $office->name : '') }}>
                                    {{ $office->name }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('office_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('office_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.role.fields.permissions_helper') }}
                        </p>
                    </div>
                    <div class="form-group {{ $errors->has('Designation') ? 'has-error' : '' }}">
                        <label for="permissions">Designation*</label>

                        <select name="designation_id" id="designation_id" class="form-control select2">
                            @foreach($designations as $id => $designation)
                                <option value="{{ $designation->id }}" {{ old('designation_id', isset($designation) ? $designation->name : '') }}>
                                    {{ $designation->name }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('designation_id'))
                            <em class="invalid-feedback">
                                {{ $errors->first('designation_id') }}
                            </em>
                        @endif
                        <p class="helper-block">
                            {{ trans('global.role.fields.permissions_helper') }}
                        </p>
                    </div>

                <input type="hidden" id="faculty_member_type_id" name="faculty_member_type_id" value="1">


                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
    @endif


@endsection
