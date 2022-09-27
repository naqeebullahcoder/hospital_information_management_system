<?php

namespace App\Http\Controllers\Admin;

use foo\bar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PublicationsAndConferences;
use App\FacultyMembers;
use Illuminate\Support\Facades\Auth;

class PublicationsController extends Controller
{
    //
    public function store(Request $request)
    {
        $publications=new PublicationsAndConferences();
        $publications->faculty_members_id=$request->faculty_members_id;
        $publications->description=$request->description;
        $publications->web_link=$request->web_link;
        $publications->year=$request->year;
        $publications->publication_type=$request->publication_type;
        $publications->updated_by=$request->updated_by;
        $publications->save();
        $faculty_resource=FacultyMembers::where('id',$publications->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));
    }
    public function destroy($id)
    {
        $publications_and_conference =PublicationsAndConferences::where('id',$id)->first();
        $faculty_members_id=$publications_and_conference->faculty_members_id;
        $publications_and_conference->delete();
        $faculty_resource=FacultyMembers::where('id',$faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));
    }
    public function edit($id)
    {
        $publications_and_conference =PublicationsAndConferences::where('id',$id)->first();
        $faculty_resource=FacultyMembers::where('id',$publications_and_conference->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource','publications_and_conference'));

    }
    public function update($id, Request $request)
    {
        $publications =PublicationsAndConferences::where('id',$id)->first();
        $publications->faculty_members_id=$request->faculty_members_id;
        $publications->description=$request->description;
        $publications->web_link=$request->web_link;
        $publications->year=$request->year;
        $publications->publication_type=$request->publication_type;
        $publications->updated_by=$request->updated_by;
        $publications->save();

        $faculty_resource=FacultyMembers::where('id',$publications->faculty_members_id)->first();
        return view('admin.FacultyMembers.edit',compact('faculty_resource'));

    }

}
