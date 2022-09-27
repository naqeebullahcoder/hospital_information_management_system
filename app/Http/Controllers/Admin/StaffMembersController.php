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

class StaffMembersController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('staff_member_access'), 403);
        $offices=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');

        if(Session::get('role')==1)
        {
            $staff_members  = StaffMember::get();
        }
        else if($offices->count()>0)
        {
            $staff_members_data=StaffMemberJobResponsibilities::wherein('office_id',$offices)->pluck('staff_member_id');
            $staff_members  = StaffMember::wherein('id',$staff_members_data)->get();
        }
        else
        {
            $staff_members  = StaffMember::where('user_id',Auth::user()->id)->get();
        }

        return view('admin.StaffMembers.index', compact('staff_members'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('staff_member_create'), 403);
        $designations=Designation::all();
        $office_ids=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$office_ids)->get();
        return view('admin.StaffMembers.create',compact('designations','offices'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('staff_member_create'), 403);
        $staff_member=new StaffMember();
//
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/faculty-members-pictures/', $filename);
            $staff_member->picture=$filename ;

        }

        if($request->user_id!=null)
        {
            $staff_member->user_id=$request->user_id;
            $user=User::where('id',$request->user_id)->first();
            $staff_member->name=$user->name;
            $staff_member->email=$user->email;

        }
        else
        {
            $staff_member->name=$request->name;
            $staff_member->email=$request->email;
        }

        $staff_member->qualification=$request->qualification;
        $staff_member->biography=$request->biography;
        $staff_member->joining_date=$request->joining_date;
        $check=$staff_member->save();
        if($check && $request->office_id!=null && $request->designation_id )
        {

            $job_responsibility=new StaffMemberJobResponsibilities();
            $job_responsibility->staff_member_id=$staff_member->id;
            $job_responsibility->office_id=$request->office_id;
            $job_responsibility->designation_id=$request->designation_id;
            $job_responsibility->save();
        }



        return redirect()->route('admin.staff-members.index');

    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('staff_member_edit'), 403);
        $designations=Designation::all();
        $office_ids=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$office_ids)->get();
        $staff_member=StaffMember::where('id',$id)->first();


        return view('admin.StaffMembers.edit',compact('designations','offices','staff_member'));
    }
    public function update(StaffMember $staff_member,Request $request)
    {
        abort_unless(\Gate::allows('staff_member_edit'), 403);
        $staff_member->designation_id=$request->designation_id;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/faculty-members-pictures/', $filename);
            $staff_member->picture=$filename ;

        }

        if($request->user_id!=null)
        {
            $staff_member->user_id=$request->user_id;
            $user=User::where('id',$request->user_id)->first();
            $staff_member->name=$user->name;
            $staff_member->email=$user->email;

        }
        else
        {
            $staff_member->name=$request->name;
        }
        $staff_member->qualification=$request->qualification;
        $staff_member->office_id=$request->office_id;
        $staff_member->joining_date=$request->joining_date;
        $staff_member->biography=$request->biography;
        $staff_member->save();

        return redirect()->route('admin.staff-members.index');

    }
    public function destroy(StaffMember $staffMember)
    {
        abort_unless(\Gate::allows('staff_member_delete'), 403);
        StaffMemberJobResponsibilities::where('staff_member_id',$staffMember->id)->delete();
        $staffMember->delete();
        return back();
    }
    public function show($id)
    {
        abort_unless(\Gate::allows('staff_member_show'), 403);
        $staff_member=StaffMember::find($id);
        return view('admin.StaffMembers.show', compact('staff_member'));
    }

}
