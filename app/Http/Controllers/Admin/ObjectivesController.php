<?php

namespace App\Http\Controllers\Admin;
use App\DepartmentObjectives;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkshopsAndSeminars;
use App\Designation;
use App\Department;
use App\FacultyMemberTypes;
use App\FacultyMembers;
use Illuminate\Support\Facades\Auth;

class ObjectivesController extends Controller
{
    //
    public function store(Request $request)
    {
        $objective=new DepartmentObjectives();
        $objective->objective=$request->objective;
        $objective->department_id=$request->department_id;
        $objective->save();
        $department_data=Department::where('id',$objective->department_id)->first();
        return view('admin.departments.edit',compact('department_data'));

    }
    public function destroy($id)
    {
        $workshop_and_seminar=WorkshopsAndSeminars::where('id',$id)->first();
        $faculty_members_id=$workshop_and_seminar->faculty_members_id;
        $workshop_and_seminar->delete();
        $faculty_resource=FacultyMembers::where('id',$faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));


    }
    public function edit($id)
    {
        $workshops_and_seminars=WorkshopsAndSeminars::where('id',$id)->first();
        $faculty_resource=FacultyMembers::where('id',$workshops_and_seminars->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource','workshops_and_seminars'));

    }
    public function update($id, Request $request)
    {
        $workshop_and_seminar=WorkshopsAndSeminars::where('id',$id)->first();
        $workshop_and_seminar->faculty_members_id=$request->faculty_members_id;
        $workshop_and_seminar->year=$request->year;
        $workshop_and_seminar->description=$request->description;
        $workshop_and_seminar->updated_by=Auth::user()->id;
        $workshop_and_seminar->save();

        $faculty_resource=FacultyMembers::where('id',$workshop_and_seminar->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));

    }
}
