<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
use App\CourseCategory;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('course_access'), 403);
        $courses=Course::all();
        return view('admin.Courses.index', compact('courses'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('course_create'), 403);
        $course = new Course();
        $course->code = $request->code;
        $course->title= $request->title;
        $course->course_category_id=$request->course_category_id;
        $course->updated_by=Auth::user()->id;
        $course->save();
        return redirect()->route('admin.courses.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('course_create'), 403);
        $course_categories=CourseCategory::all();
        return view('admin.Courses.create',compact('course_categories'));
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('course_edit'), 403);
        $course = new Course();
        $course = Course::where('id', $id)->first();
        $course_categories=CourseCategory::all();
        return view('admin.Courses.edit', compact('course','course_categories'));
    }
    public function update(Course $course,Request $request)
    {
        abort_unless(\Gate::allows('course_edit'), 403);
        $course->code=$request->code;
        $course->title=$request->title;
        $course->course_category_id=$request->course_category_id;
        $course->updated_by=Auth::user()->id;
        $course->save();
        return redirect()->route('admin.courses.index');
    }
    public function destroy(Course $course)
    {
        abort_unless(\Gate::allows('course_delete'), 403);
        $course->delete();
        return redirect()->route('admin.courses.index');
    }

}
