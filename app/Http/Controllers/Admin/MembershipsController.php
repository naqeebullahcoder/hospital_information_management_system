<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Memberships;
use App\Designation;
use App\Department;
use App\FacultyMemberTypes;
use App\FacultyMembers;
use Illuminate\Support\Facades\Auth;

class MembershipsController extends Controller
{
    //

    public function store(Request $request)
    {
        $memberships=new Memberships();
        $memberships->faculty_members_id=$request->faculty_members_id;
        $memberships->year=$request->year;
        $memberships->description=$request->description;
        $memberships->updated_by=Auth::user()->id;
        $memberships->save();
        $faculty_resource=FacultyMembers::where('id',$memberships->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));
    }
    public function destroy($id)
    {
        $memberships=Memberships::where('id',$id)->first();
        $faculty_resource_id=$memberships->faculty_members_id;
        $memberships->delete();
        $faculty_resource=FacultyMembers::where('id',$faculty_resource_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));

    }
    public function edit($id)
    {
        $memberships=Memberships::where('id',$id)->first();
        $faculty_resource=FacultyMembers::where('id',$memberships->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource','memberships'));

    }
    public function update($id, Request $request)
    {
        $memberships=Memberships::where('id',$id)->first();
        $memberships->faculty_members_id=$request->faculty_members_id;
        $memberships->year=$request->year;
        $memberships->description=$request->description;
        $memberships->updated_by=Auth::user()->id;
        $memberships->save();

        $faculty_resource=FacultyMembers::where('id',$memberships->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));

    }
}
