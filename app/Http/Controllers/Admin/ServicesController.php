<?php

namespace App\Http\Controllers\Admin;

use App\Media;
use App\Services;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ServicesController extends Controller
{
    //

    public function index()
    {
        //abort_unless(\Gate::allows('event_access'), 403);
        // $events=Event::all();
        $services=Services::all();
        return view('admin.services.index',compact('services'));
    }

    public function create()
    {
        // abort_unless(\Gate::allows('event_create'), 403);
        // $status=Status::get();
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $services=new Services();
        $services->name=$request->name;
        $services->charges= $request->charges;
        $services->departments=$request->departments;
        $services->updated_by=Auth::user()->id;
        $services->save();

        return redirect()->route('admin.services.index');
    }

    public function edit($id)
    {
        $services=new Services();
        $services = Services::where('id', $id)->first();
        return view('admin.services.edit',compact('services'));
    }

    public function update($id,Request $request)
    {
        $services=Services::where('id',$id)->first();
        $services->name = $request->name;
        $services->charges= $request->charges;
        $services->departments= $request->departments;
        $services->save();
        return redirect()->route('admin.services.index');

    }

    public function show(Services $service)
    {
        return view('admin.services.show',compact('service'));

    }

    public function destroy(Services $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index');
    }
}
