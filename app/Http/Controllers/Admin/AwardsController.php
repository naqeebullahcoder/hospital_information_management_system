<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HonoursAndAwards;
use App\Designation;
use App\Department;
use App\FacultyMemberTypes;
use App\FacultyMembers;
use Illuminate\Support\Facades\Auth;

class AwardsController extends Controller
{
    //
    public function store(Request $request)
    {
        $awards=new HonoursAndAwards();
        $awards->faculty_members_id=$request->faculty_members_id;
        $awards->year=$request->year;
        $awards->description=$request->description;
        $awards->updated_by=Auth::user()->id;
        $awards->save();
        $faculty_resource=FacultyMembers::where('id',$awards->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));

    }
    public function destroy($id)
    {
        $honours_and_award=HonoursAndAwards::where('id',$id)->first();
        $faculty_members_id=$honours_and_award->faculty_members_id;
        $honours_and_award->delete();
        $faculty_resource=FacultyMembers::where('id',$faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));


    }
    public function edit($id)
    {
        $honours_and_award=HonoursAndAwards::where('id',$id)->first();
        $faculty_resource=FacultyMembers::where('id',$honours_and_award->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource','honours_and_award'));

    }
    public function update($id, Request $request)
    {
        $honours_and_award=HonoursAndAwards::where('id',$id)->first();
        $honours_and_award->faculty_members_id=$request->faculty_members_id;
        $honours_and_award->year=$request->year;
        $honours_and_award->description=$request->description;
        $honours_and_award->updated_by=Auth::user()->id;
        $honours_and_award->save();

        $faculty_resource=FacultyMembers::where('id',$honours_and_award->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));

    }

}