<?php

namespace App\Http\Controllers\Admin;

use App\FacultyMembers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\DepartmentUser;
use App\Faculties;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class DepartmentsController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('department_access'), 403);
        $departments_data=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $departments=Department::wherein('id',$departments_data)->get();
        return view('admin.departments.index', compact('departments'));
    }
    public function show(Department $department)
    {
//        abort_unless(\Gate::allows('department_show'), 403);
        return view('admin.departments.show', compact('department'));
    }
    public function destroy(Department $department)
    {
//        abort_unless(\Gate::allows('department_delete'), 403);
        $departments_data=DepartmentUser::where('department_id',$department->id)->delete();
        $department->delete();
        return back();
    }
    public function create()
    {
//        abort_unless(\Gate::allows('department_create'), 403);
        $departments=Department::all();
        $faculties=Faculties::all();
        $faculty_members=FacultyMembers::all();
        return view('admin.departments.create',compact('faculties','departments','faculty_members'));
    }
    public function store(Request $request)
    {
//        abort_unless(\Gate::allows('department_create'), 403);
        $department=new Department();
        $department->faculties_id=$request->faculties_id;
        $department->parent_id=$request->parent_id;
        $department->name=$request->name;
        $department->introduction=$request->introduction;
        $department->picture=$request->picture;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/departments', $filename);
            $department->picture=$filename ;
        }
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/departments/thumbnails', $filename);
            $department->thumbnail=$filename;
        }
        $department->hod_id=$request->hod_id;
        $department->hod_message=$request->hod_message;
        $department->vision=$request->vision;
        $department->mission=$request->mission;
//        $department->contact_person_id=$request->contact_person_id;
        $department->contact_person_name=$request->contact_person_name;
        $department->contact_person_number=$request->contact_person_number;
        $department->contact_person_email=$request->contact_person_email;
        $department->save();
        $departmentuser=new DepartmentUser();
        $departmentuser->user_id=Auth::user()->id;
        $departmentuser->department_id=$department->id;
        $departmentuser->save();
        $departments_data=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $departments=Department::wherein('id',$departments_data)->get();
        return view('admin.departments.index', compact('departments'));

    }
    public function edit($id)
    {
//        abort_unless(\Gate::allows('department_edit'), 403);

        $departments = Department::all();
        $faculties = Faculties::all();
        $faculty_members = FacultyMembers::all();
        $department = new Department();
        $department_data = Department::where('id', $id)->first();

        return view('admin.departments.edit', compact('department_data', 'faculties', 'departments', 'faculty_members'));

    }
    public function update(Department $department, Request $request)
    {
//        abort_unless(\Gate::allows('department_edit'), 403);

        $department->faculties_id=$request->faculties_id;
        $department->parent_id=$request->parent_id;
        $department->name=$request->name;
        $department->introduction=$request->introduction;
        $department->picture=$request->picture;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/departments', $filename);
            $department->picture=$filename ;
        }
        if($request->hasfile('thumbnail'))
        {
            $file = $request->file('thumbnail');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/departments/thumbnails', $filename);
            $department->thumbnail=$filename ;
        }
        $department->hod_id=$request->hod_id;
        $department->hod_message=$request->hod_message;
        $department->vision=$request->vision;
        $department->mission=$request->mission;
//        $department->contact_person_id=$request->contact_person_id;
        $department->contact_person_name=$request->contact_person_name;
        $department->contact_person_number=$request->contact_person_number;
        $department->contact_person_email=$request->contact_person_email;
        $department->save();
        $departments_data=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $departments=Department::wherein('id',$departments_data)->get();
        return view('admin.departments.index', compact('departments'));

    }




}
