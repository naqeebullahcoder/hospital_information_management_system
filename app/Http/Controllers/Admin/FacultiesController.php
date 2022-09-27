<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;
use App\Faculties;
use App\DepartmentUser;
use App\FacultyMembers;
use Illuminate\Support\Facades\Auth;

class FacultiesController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('faculties_access'), 403);
        $faculty_resource=new FacultyMembers();
        $faculty_resource=FacultyMembers::all();
        $faculties=Faculties::orderby('priority')->get();
        return view('admin.faculties.index', compact('faculties','faculty_resource'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('faculties_create'), 403);
        return view('admin.faculties.create');
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('faculties_create'), 403);
        $faculties = new Faculties();
        $faculties->name = $request->name;
        $faculties->introduction = $request->introduction;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/images', $filename);
            $faculties->picture=$filename ;

        }
        $faculties->chairman = $request->chairman;
        $faculties->priority = $request->priority;
        $faculties->updated_by = Auth::user()->id;
        $faculties->save();
        return redirect()->route('admin.faculties.index');
    }
    public function destroy(Faculties $faculty)
    {
        abort_unless(\Gate::allows('faculties_delete'), 403);
        $faculty->delete();
        return back();

    }
    public function show(Faculties $faculty)
    {
        abort_unless(\Gate::allows('faculties_show'), 403);
        return view('admin.faculties.show', compact('faculty'));
    }

    public function edit(Faculties $faculty)
    {
        abort_unless(\Gate::allows('faculties_edit'), 403);
        return view('admin.faculties.edit', compact('faculty'));
    }

    public function update(Faculties $faculty,Request $request)
    {
        abort_unless(\Gate::allows('faculties_edit'), 403);
        $faculty->name = $request->name;
        $faculty->introduction = $request->introduction;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/images', $filename);
            $faculty->picture=$filename ;

        }
        $faculty->chairman = $request->chairman;
        $faculty->priority = $request->priority;
        $faculty->updated_by = Auth::user()->id;
        $faculty->save();
        return redirect()->route('admin.faculties.index');
    }
}
