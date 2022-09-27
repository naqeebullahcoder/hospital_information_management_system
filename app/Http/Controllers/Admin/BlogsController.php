<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\News;
use App\Status;
use App\Media;
use App\Event;
use Illuminate\Support\Facades\Auth;

class BlogsController extends Controller
{
    //

    public function index()
    {

        abort_unless(\Gate::allows('blog_access'), 403);
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('blog_create'), 403);
        $status=Status::get();
        return view('admin.blogs.create',compact('status'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('blog_create'), 403);
        $blog=new Blog();
        $blog->headline = $request->headline;
        $blog->description= $request->description;

        $blog->video_link= $request->video_link;
        $blog->date=$request->date;
        $blog->status=$request->status;
        $blog->written_by=$request->written_by;
        $blog->updated_by=Auth::user()->id;
        $blog->save();
        if($files=$request->file('picture')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/events',$name);
                $images[]=$name;

                $media=new Media();
                $media->blog_id=$blog->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $blog->picture=$name ;
                    $blog->save();
                }

            }
        }
        return redirect()->route('admin.blogs.index');
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('blog_edit'), 403);
        $status=Status::get();
        $blog=new Blog();
        $blog = Blog::where('id', $id)->first();
        return view('admin.blogs.edit',compact('blog','status'));
    }

    public function update(Blog $blog,Request $request)
    {
        abort_unless(\Gate::allows('blog_edit'), 403);
        $blog->headline = $request->headline;
        $blog->description= $request->description;

        $blog->video_link= $request->video_link;
        $blog->date=$request->date;
        $blog->status=$request->status;
        $blog->written_by=$request->written_by;
        $blog->updated_by=Auth::user()->id;
        $blog->save();
        if($files=$request->file('picture')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/events',$name);
                $images[]=$name;

                $media=new Media();
                $media->blog_id=$blog->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $blog->picture=$name ;
                    $blog->save();
                }

            }
        }
        return redirect()->route('admin.blogs.index');

    }
    public function show(Blog $blog)
    {
        abort_unless(\Gate::allows('blog_show'), 403);
        $media=Media::where('blog_id',$blog->id)->get();
        return view('admin.blogs.show',compact('blog','media'));

    }
    public function destroy(Blog $blog)
    {
        abort_unless(\Gate::allows('blog_delete'), 403);
        $blog->delete();
        return redirect()->route('admin.blogs.index');
    }
}
