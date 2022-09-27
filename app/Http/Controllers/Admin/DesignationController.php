<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Designation;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    //
    public function index()
    {
//        abort_unless(\Gate::allows('designation_access'), 403);
        $designations = Designation::orderby('priority')->get();
        return view('admin.designations.index', compact('designations'));
    }

    public function create()
    {
//        abort_unless(\Gate::allows('designation_create'), 403);
        return view('admin.designations.create');
    }

    public function store(Request $request)
    {
//        abort_unless(\Gate::allows('designation_create'), 403);
        $designation = new Designation();
        $designation->name = $request->name;
        $designation->priority = $request->priority;
        $designation->updated_by = Auth::user()->id;
        $designation->save();
        return redirect()->route('admin.designations.index');
    }

    public function destroy(Designation $designation)
    {
//        abort_unless(\Gate::allows('designation_delete'), 403);
        $designation->delete();
        return back();
    }
    public function edit($id)
    {
//        abort_unless(\Gate::allows('designation_edit'), 403);
        $designations=Designation::where('id',$id)->first();
        return view('admin.designations.edit', compact('designations'));
    }
    public function update(Designation $designation ,Request $request)
    {
//        abort_unless(\Gate::allows('designation_edit'), 403);
        $designation->name=$request->name;
        $designation->priority = $request->priority;
        $designation->updated_by=Auth::user()->id;
        $designation->save();
        return redirect()->route('admin.designations.index');

    }

}