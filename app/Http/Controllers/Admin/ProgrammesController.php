<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Program;
use App\DepartmentUser;
use Illuminate\Support\Facades\Auth;

class ProgrammesController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('degree_program_access'), 403);
        $departments=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $programmes = Program::wherein('department_id',$departments)->orderby('name')->get();
        return view('admin.Programmes.index', compact('programmes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('degree_program_create'), 403);
        $departments_data=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $departments=Department::wherein('id',$departments_data)->get();
        return view('admin.Programmes.create',compact('departments'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('degree_program_create'), 403);
        $prgram=new Program();
        $prgram->name=$request->name;
        $prgram->program_structure=$request->program_structure;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/images', $filename);
            $prgram->picture=$filename ;
        }

        $prgram->duration=$request->duration;
        $prgram->no_of_semesters=$request->no_of_semesters;
        $prgram->eligibility_criteria=$request->eligibility_criteria;
        $prgram->degree_completion_requirements=$request->degree_completion_requirements;
        $prgram->department_id=$request->department_id;
        $prgram->save();
        return redirect()->route('admin.programmes.index');

    }
    public function edit($id)
    {
        abort_unless(\Gate::allows('degree_program_edit'), 403);
        $departments_data=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $departments=Department::wherein('id',$departments_data)->get();
        $program = Program::where('id', $id)->first();
        return view('admin.Programmes.edit', compact('departments', 'program'));

    }
    public function update($id, Request $request)
    {
        abort_unless(\Gate::allows('degree_program_edit'), 403);
        $program= Program::where('id',$id)->first();
        $program->name=$request->name;
        $program->program_structure=$request->program_structure;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/images', $filename);
            $program->picture=$filename ;
        }

        $program->duration=$request->duration;
        $program->no_of_semesters=$request->no_of_semesters;
        $program->eligibility_criteria=$request->eligibility_criteria;
        $program->degree_completion_requirements=$request->degree_completion_requirements;
        $program->department_id=$request->department_id;
        $program->save();

        $departments=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $programmes = Program::wherein('department_id',$departments)->orderby('name')->get();
        return view('admin.Programmes.index', compact('programmes'));

    }
    public function destroy($id)
    {
        abort_unless(\Gate::allows('degree_program_delete'), 403);
        Program::where('id',$id)->delete();
        return back();
    }
    public function show($id)
    {
        abort_unless(\Gate::allows('degree_program_show'), 403);
        $program= Program::where('id',$id)->first();
        return view('admin.Programmes.show', compact('program'));
    }



}
