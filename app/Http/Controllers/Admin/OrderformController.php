<?php

namespace App\Http\Controllers\Admin;
use App\Department;
use App\Doctors;
use App\FacultyMembers;
use App\Http\Requests\StoreRoleRequest;
use App\Orderdetails;
use App\Orderform;
use App\Patient;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderformController extends Controller
{
    //
    public function index()
    {
        //abort_unless(\Gate::allows('event_access'), 403);
        // $events=Event::all();

        $orderforms=Orderform::where('status','!=',2)->Orderby('id','DESC')->get();
        $patients=Patient::all();


        return view('admin.orderform.index',compact('patients','orderforms'));
    }

    public function create()
    {
        $orderforms= Orderform::all();
        $patients = Patient::all();
        return view('admin.orderform.create',compact('patients','orderforms'));
    }

    public function edit($id)
    {
        $orderform=Orderform::where('id',$id)->first();
        $orderdetails_data=Orderdetails::where('order_id',$orderform->id)->get();
        $doctors=FacultyMembers::where('faculty_member_type_id',2)->get();
        $services=Services::all();
        $departments=Department::all();

        return view('admin.orderform.edit',compact('orderform','doctors','services','departments','orderdetails_data'));

    }

    public function show()
    {
        $orderform=Orderform::where('id',118)->first();
//        $orderdetails=Orderdetails::where('order_id','2')->first();
        return view('admin.orderform.show',compact('orderform'));

    }

    public function store(Request $request)
    {
//        $orderform=new Orderform();
//        if($request->name!=null)
//        {
//            //------------- Add Patient ------------------
//            $patient=new Patient();
//            $patient->name=$request->name;
//            $patient->mobile_no=$request->mobile_no;
//            $patient->cnic= $request->cnic;
//            $patient->gender=$request->gender;
//            $patient->dob=$request->dof;
//            $patient->marital_status=$request->marital_status;
//            $patient->city=$request->city;
//            $patient->monthly_income=$request->monthly_income;
//            $patient->phone_no=$request->phone_no;
//            $patient->street_address=$request->street_address;
//            $patient->updated_by=Auth::user()->id;
//            $patient->save();
//
//            $orderform->patient_id = $patient->id;
//
//        }
//        else
//        {
//            $orderform->patient_id = $request->patient_id;
//        }
//
//        $orderform->user_id= Auth::user()->id;
//        $orderform->status= 5;
//        $orderform->save();
//
//
//        $orderdetails_data=Orderdetails::where('order_id',$orderform->id)->get();
        $orderdetails_data=Orderdetails::where('order_id',118)->get();
        $doctors=FacultyMembers::where('faculty_member_type_id',2)->get();
        $services=Services::all();
        $departments=Department::all();

        $orderform=Orderform::where('id',118)->first();
        return view('admin.orderform.edit',compact('orderform','doctors','services','departments','orderdetails_data'));

    }
    public function update(Orderform $orderform, Request $request)
    {
        $orderdetails=new Orderdetails();
        $orderdetails->order_id=$request->order_id;
        $orderdetails->service_id=$request->service_id;
        $orderdetails->doctor_id=$request->doctor_id;
        $orderdetails->department_id=$request->department_id;
        if($request->service_id!=null)
        {
            $orderdetails->amount=Services::where('id',$request->service_id)->first()->charges;
            $orderdetails->save();
        }
        elseif ($request->doctor_id!=null)
        {
            $orderdetails->amount=FacultyMembers::where('id',$request->doctor_id)->first()->fee;
            $orderdetails->save();
        }

        $doctors=FacultyMembers::where('faculty_member_type_id',2)->get();
        $services=Services::all();
//        $departments=Department::all();
        $orderdetails_data=Orderdetails::where('order_id',$orderdetails->order_id)->get();

        return view('admin.orderform.edit',compact('orderdetails','orderform','services','doctors','orderdetails_data'));
    }

    public function destroy($id)
    {
        $orderdetail=Orderdetails::where('id',$id)->first();
        $order_id=$orderdetail->order_id;
        $orderdetail->delete();

        $orderdetails_data=Orderdetails::where('order_id',$order_id)->get();
        $doctors=FacultyMembers::where('faculty_member_type_id',2)->get();
        $services=Services::all();
        $departments=Department::all();

        $orderform=Orderform::where('id',$order_id)->first();
        return view('admin.orderform.edit',compact('orderform','doctors','services','departments','orderdetails_data'));
    }


}
