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

class OfficeProjectsController extends Controller
{
    //
    public function store(Request $request)
    {
        $office_project=new OfficeProject();
        $office_project->name=$request->name;
        $office_project->description=$request->description;
        $office_project->office_id=$request->office_id;
        $office_project->start_date=$request->start_date;
        $office_project->end_date=$request->end_date;
        $office_project->updated_by=Auth::user()->id;
        $office_project->save();

        $office_data = Office::where('id', $office_project->office_id)->first();
        $staff_members=StaffMember::all();
        return view('admin.offices.edit', compact('office_data','staff_members'));

    }
    public function destroy($id)
    {
        $office_project=new OfficeProject();
        $office_project=OfficeProject::where('id',$id)->first();
        $office_project->delete();

        $office_data = Office::where('id', $office_project->office_id)->first();
        $staff_members=StaffMember::all();
        return view('admin.offices.edit', compact('office_data','staff_members'));

    }
    public function edit($id)
    {
        $office_project=OfficeProject::where('id',$id)->first();

        $office_data = Office::where('id', $office_project->office_id)->first();
        $staff_members=StaffMember::all();
        return view('admin.offices.edit', compact('office_data','staff_members','office_project'));

    }
    public function update($id, Request $request)
    {
        $office_project=OfficeProject::where('id',$id)->first();

        $office_project->name=$request->name;
        $office_project->description=$request->description;
        $office_project->office_id=$request->office_id;
        $office_project->start_date=$request->start_date;
        $office_project->end_date=$request->end_date;
        $office_project->updated_by=Auth::user()->id;
        $office_project->save();

        $office_data = Office::where('id', $office_project->office_id)->first();
        $staff_members=StaffMember::all();
        return view('admin.offices.edit', compact('office_data','staff_members'));

    }
}
