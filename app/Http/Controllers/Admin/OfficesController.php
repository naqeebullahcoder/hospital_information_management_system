<?php

namespace App\Http\Controllers\Admin;

use App\OfficeProject;
use App\OfficeUser;
use App\StaffMember;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Status;
use App\Office;
use Illuminate\Support\Facades\Auth;


class OfficesController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('office_access'), 403);
        $offices_data=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$offices_data)->get();
        $staff_members=StaffMember::all();
        return view('admin.offices.index', compact('offices','staff_members'));
    }
    public function show(Office $office)
    {
        abort_unless(\Gate::allows('office_show'), 403);
        return view('admin.offices.show', compact('office'));
    }
    public function destroy(Office $office)
    {
        abort_unless(\Gate::allows('office_delete'), 403);
        $offices_data=OfficeUser::where('office_id',$office->id)->delete();
        $office->delete();
        return back();
    }

    public function create()
    {
        abort_unless(\Gate::allows('office_create'), 403);

        $staff_members=StaffMember::get();
        return view('admin.offices.create',compact('staff_members'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('office_create'), 403);
        $office=new Office();

        $office->name=$request->name;
        $office->introduction=$request->introduction;
        $office->picture=$request->picture;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/images', $filename);
            $office->picture=$filename ;
        }

//        $office->director_id=$request->director_id;
        $office->director_message=$request->director_message;
        $office->contact_person_name=$request->contact_person_name;
        $office->contact_person_number=$request->contact_person_number;
        $office->contact_person_email=$request->contact_person_email;

        $office->save();
        $officeuser=new OfficeUser();
        $officeuser->user_id=Auth::user()->id;
        $officeuser->office_id=$office->id;
        $officeuser->save();

        $offices_data=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$offices_data)->get();
        $staff_members=StaffMember::all();
        return view('admin.offices.index', compact('offices','staff_members'));

    }
    public function edit($id)
    {
        abort_unless(\Gate::allows('office_edit'), 403);

        $office_data = Office::where('id', $id)->first();
        $staff_members=StaffMember::all();
        return view('admin.offices.edit', compact('office_data','staff_members'));

    }
    public function update(Office $office, Request $request)
    {
        abort_unless(\Gate::allows('office_edit'), 403);
        // $name=User::where('id',$request->user_id)->first()->name;
        // $office->user_id=$request->user_id;
        $office->name=$request->name;
        $office->introduction=$request->introduction;
        $office->picture=$request->picture;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/images', $filename);
            $office->picture=$filename ;
        }

//        $office->director_id=$request->director_id;
        $office->director_message=$request->director_message;
        $office->contact_person_name=$request->contact_person_name;
        $office->contact_person_number=$request->contact_person_number;
        $office->contact_person_email=$request->contact_person_email;

        $office->save();
        $offices_data=OfficeUser::where('user_id',Auth::user()->id)->pluck('office_id');
        $offices=Office::wherein('id',$offices_data)->get();

        return view('admin.offices.index', compact('offices'));

    }

}
