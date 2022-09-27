<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreSchemeOfStudyRequest;
use App\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SchemeOfStudies;
use App\Department;
use App\Course;

class SchemeOfStudiesController extends Controller
{
    //
    public function index()
    {


    }
    public function show($id)
    {

        abort_unless(\Gate::allows('scheme_of_study_access'), 403);
        $program=new Program();
        $program =Program::where('id',$id)->first();
        $schem_of_studies=SchemeOfStudies::where('program_id',$id)->orderby('semester')->get();
        return view('admin.SchemeOfStudies.index', compact('schem_of_studies','program'));
    }
    public function store(Request $request)
    {
      abort_unless(\Gate::allows('scheme_of_study_create'), 403);
        $schem_of_study=new SchemeOfStudies();
        $schem_of_study->course_id=$request->course_id;
        $schem_of_study->program_id=$request->program_id;
        $schem_of_study->semester=$request->semester;
        $schem_of_study->lab_credit_hours=$request->lab_credit_hours;
        $schem_of_study->course_credit_hours=$request->course_credit_hours;
        $schem_of_study->save();
        $schem_of_studies=SchemeOfStudies::where('program_id',$schem_of_study->program_id)->orderby('semester')->get();
        $program =Program::where('id',$schem_of_study->program_id)->first();

        return view('admin.SchemeOfStudies.index', compact('schem_of_studies','program'));
    }
    public function create(Request $request)
    {
        abort_unless(\Gate::allows('scheme_of_study_create'), 403);
        $program=new Program();
        $program =Program::where('id',$request->id)->first();
        $courses=Course::all();
        return view('admin.SchemeOfStudies.create',compact('program','courses'));
    }
    public function edit($id)
    {
        abort_unless(\Gate::allows('scheme_of_study_edit'), 403);
        $schem_of_study=new SchemeOfStudies();
        $schem_of_study = schemeOfStudies::where('id', $id)->first();
        $program =Program::where('id',$schem_of_study->program_id)->first();
        $courses=Course::all();
        return view('admin.SchemeOfStudies.edit', compact('program','courses','schem_of_study'));
    }
    public function update(SchemeOfStudies $schem_of_study,Request $request)
    {
        abort_unless(\Gate::allows('scheme_of_study_edit'), 403);
        $schem_of_study_new =SchemeOfStudies::where('id',$request->id)->first();
        $schem_of_study_new->course_id=$request->course_id;
        $schem_of_study_new->program_id=$request->program_id;
        $schem_of_study_new->semester=$request->semester;
        $schem_of_study_new->lab_credit_hours=$request->lab_credit_hours;
        $schem_of_study_new->course_credit_hours=$request->course_credit_hours;
        $schem_of_study_new->save();
        $schem_of_studies=SchemeOfStudies::where('program_id',$schem_of_study_new->program_id)->orderby('semester')->get();

        $program =Program::where('id',$schem_of_study_new->program_id)->first();

        return view('admin.SchemeOfStudies.index', compact('schem_of_studies','program'));
    }
    public function destroy($id)
    {
        abort_unless(\Gate::allows('scheme_of_study_delete'), 403);
        $schemeOfStudies=new schemeOfStudies();
        $schemeOfStudies=SchemeOfStudies::where('id',$id)->first();
        $program_id=$schemeOfStudies->program_id;
        $schemeOfStudies->delete();

        $schem_of_studies=SchemeOfStudies::where('program_id',$program_id)->orderby('semester')->get();
        $program =Program::where('id',$program_id)->first();
        return view('admin.SchemeOfStudies.index', compact('schem_of_studies','program'));
    }



}
