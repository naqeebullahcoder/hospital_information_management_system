<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCourseCategoryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CourseCategory;

class CourseCategoriesController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('course_category_access'), 403);
        $course_categories = CourseCategory::all();
        return view('admin.CourseCategories.index', compact('course_categories'));
    }

    public function store(Request $request)
    {
        abort_unless(\Gate::allows('course_category_create'), 403);
        $course_category = new CourseCategory();
        $course_category->name = $request->name;
        $course_category->save();
        return redirect()->route('admin.course-categories.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('course_category_create'), 403);
        return view('admin.CourseCategories.create');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('course_category_edit'), 403);
        $course_category = new CourseCategory();
        $course_category = CourseCategory::where('id', $id)->first();
        return view('admin.CourseCategories.edit', compact('course_category'));
    }
    public function update(CourseCategory $course_category,Request $request)
    {
        abort_unless(\Gate::allows('course_category_edit'), 403);
        $course_category->name=$request->name;
        $course_category->save();
        return redirect()->route('admin.course-categories.index');
    }
    public function destroy(CourseCategory $courseCategory)
    {
        abort_unless(\Gate::allows('course_category_delete'), 403);
        $courseCategory->delete();
        return redirect()->route('admin.course-categories.index');
    }

}