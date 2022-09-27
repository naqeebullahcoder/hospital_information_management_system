<?php

namespace App\Http\Controllers\Admin;

use App\Patient;
use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //

    public function index()
    {
        //abort_unless(\Gate::allows('event_access'), 403);
        // $events=Event::all();
        $patients=Patient::all();
        return view('admin.patients.index',compact('patients'));
    }

    public function create()
    {
        // abort_unless(\Gate::allows('event_create'), 403);
        // $status=Status::get();
        return view('admin.patients.create');
    }

    public function edit($id)
    {
        $patients=new Patient();
        $patients = Patient::where('id', $id)->first();
        return view('admin.patients.edit',compact('patients'));
    }

    public function store(Request $request)
    {
        $patients=new Patient();
        $patients->name=$request->name;
        $patients->mobile_no=$request->mobile_no;
        $patients->cnic= $request->cnic;
        $patients->gender=$request->gender;
        $patients->dob=$request->dof;
        $patients->marital_status=$request->marital_status;
        $patients->city=$request->city;
        $patients->monthly_income=$request->monthly_income;
        $patients->phone_no=$request->phone_no;
        $patients->street_address=$request->street_address;
        $patients->updated_by=Auth::user()->id;
        $patients->save();

        return redirect()->route('admin.patients.index');
    }

    public function update($id,Request $request)
    {
        $patients=Patient::where('id',$id)->first();
        $patients->name=$request->name;
        $patients->mobile_no=$request->mobile_no;
        $patients->cnic= $request->cnic;
        $patients->gender=$request->gender;
        $patients->dob=$request->dof;
        $patients->marital_status=$request->marital_status;
        $patients->city=$request->city;
        $patients->monthly_income=$request->monthly_income;
        $patients->phone_no=$request->phone_no;
        $patients->street_address=$request->street_address;
        $patients->updated_by=Auth::user()->id;
        $patients->save();
        return redirect()->route('admin.patients.index');

    }


    public function show(Patient $patient)
    {
        return view('admin.patients.show',compact('patient'));

    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('admin.patients.index');
    }

}
