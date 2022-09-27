<?php

namespace App\Http\Controllers\Admin;

use App\FacultyMembers;
use App\Office;
use App\OfficeUser;
use App\StaffMember;
use App\Designation;
use App\StaffMemberJobResponsibilities;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\DepartmentUser;
use App\Faculties;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class StaffMemberJobResponsibilitiesController extends Controller
{
    //
    public function store(Request $request)
    {
        $job_responsibility=new StaffMemberJobResponsibilities();
        $job_responsibility->staff_member_id=$request->staff_member_id;
        $job_responsibility->designation_id=$request->designation_id;
        $job_responsibility->office_id=$request->office_id;
        $job_responsibility->priority=$request->priority;
        $job_responsibility->updated_by=Auth::user()->id;
        $job_responsibility->save();


        $designations=Designation::all();
        $office_ids=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$office_ids)->get();
        $staff_member=StaffMember::where('id',$job_responsibility->staff_member_id)->first();

        return view('admin.StaffMembers.edit',compact('designations','offices','staff_member','job_responsibility'));

    }
    public function edit($id)
    {
        $job_responsibility=StaffMemberJobResponsibilities::where('id',$id)->first();
        $designations=Designation::all();
        $office_ids=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$office_ids)->get();
        $staff_member=StaffMember::where('id',$job_responsibility->staff_member_id)->first();

        return view('admin.StaffMembers.edit',compact('designations','offices','staff_member','job_responsibility'));

    }
    public function update($id, Request $request)
    {
        $job_responsibility=StaffMemberJobResponsibilities::where('id',$id)->first();
        $job_responsibility->staff_member_id=$request->staff_member_id;
        $job_responsibility->designation_id=$request->designation_id;
        $job_responsibility->office_id=$request->office_id;
        $job_responsibility->priority=$request->priority;
        $job_responsibility->updated_by=Auth::user()->id;
        $job_responsibility->save();

        $designations=Designation::all();
        $office_ids=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$office_ids)->get();
        $staff_member=StaffMember::where('id',$job_responsibility->staff_member_id)->first();

        return view('admin.StaffMembers.edit',compact('designations','offices','staff_member'));


    }
    public function destroy($id)
    {
        $job_responsibility=StaffMemberJobResponsibilities::where('id',$id)->first();
        $staff_member=StaffMember::where('id',$job_responsibility->staff_member_id)->first();

        StaffMemberJobResponsibilities::where('id',$id)->delete();

        $designations=Designation::all();
        $office_ids=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$office_ids)->get();
        return view('admin.StaffMembers.edit',compact('designations','offices','staff_member'));


    }
}
