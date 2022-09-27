<?php

namespace App\Http\Controllers\Admin;

use App\Doctors;
use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{
    //

    public function index()
    {
        $doctors=Doctors::all();
        return view('admin.doctors.index',compact('doctors'));
    }

    public function create()
    {
        return view('admin.doctors.create');
    }

    public function edit($id)
    {
        $doctors=new Doctors();
        $doctors = Doctors::where('id', $id)->first();
        return view('admin.doctors.edit',compact('doctors'));
    }

    public function store(Request $request)
    {
        $doctors=new Doctors();
        $doctors->name=$request->name;
        $doctors->cnic= $request->cnic;
        $doctors->qualification=$request->qualification;
        $doctors->license_no=$request->license_no;
        $doctors->specialization=$request->specialization;
        $doctors->address=$request->address;
//        $doctors->picture=$request->picture;
        $doctors->mobile_no=$request->mobile_no;
        $doctors->phone_no=$request->phone_no;
        $doctors->fee=$request->fee;
        $doctors->updated_by=Auth::user()->id;
        $doctors->save();

        if($files=$request->file('picture')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/doctors',$name);
                $images[]=$name;

                $media=new Media();
                $media->doctor_id=$doctors->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $doctors->picture=$name ;
                    $doctors->save();
                }

            }
        }

        return redirect()->route('admin.doctors.index');
    }

    public function update($id,Request $request)
    {
        $doctors=Doctors::where('id',$id)->first();
        $doctors->name = $request->name;
        $doctors->cnic= $request->cnic;
        $doctors->qualification= $request->qualification;
        $doctors->license_no = $request->license_no;
        $doctors->specialization= $request->specialization;
        $doctors->picture = $request->picture;
        $doctors->mobile_no= $request->mobile_no;
        $doctors->phone_no= $request->phone_no;
        $doctors->fee= $request->fee;
        $doctors->address= $request->address;
        $doctors->save();
        return redirect()->route('admin.doctors.index');

    }


    public function show(Doctors $doctor)
    {
        return view('admin.doctors.show',compact('doctor'));

    }

    public function destroy(Doctors $doctor)
    {
        $doctor->delete();
        return redirect()->route('admin.doctors.index');
    }
}
