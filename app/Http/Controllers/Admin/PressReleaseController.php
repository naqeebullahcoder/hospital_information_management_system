<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blog;
use App\News;
use App\Status;
use App\Media;
use App\Event;
use App\PressRelease;
use Illuminate\Support\Facades\Auth;



class PressReleaseController extends Controller
{
    //
    public function index()
    {
        abort_unless(\Gate::allows('press_access'), 403);
        $press_release = PressRelease::all();
//        dd($press_release);
        return view('admin.press.index', compact('press_release'));
    }
    public function create()
    {
        abort_unless(\Gate::allows('press_create'), 403);
        $status=Status::get();
        return view('admin.press.create',compact('status'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('press_create'), 403);
        $press=new PressRelease();
        $press->headline = $request->headline;
        $press->description= $request->description;

        $press->video_link= $request->video_link;
        $press->date=$request->date;
        $press->status=$request->status;
        $press->updated_by=Auth::user()->id;
        $press->save();
        if($files=$request->file('picture')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/press',$name);
                $images[]=$name;

                $media=new Media();
                $media->press_release_id=$press->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $press->picture=$name ;
                    $press->save();
                }

            }
        }
        return redirect()->route('admin.press.index');
    }
    public function edit($id)
    {
        abort_unless(\Gate::allows('press_edit'), 403);
        $status=Status::get();
        $press=new PressRelease();
        $press = PressRelease::where('id', $id)->first();
        return view('admin.press.edit',compact('press','status'));
    }

    public function update(PressRelease $press,Request $request)
    {
        abort_unless(\Gate::allows('press_edit'), 403);
        $press->headline = $request->headline;
        $press->description= $request->description;
//        $press->video_link= $request->video_link;
        $press->date=$request->date;
        $press->status=$request->status;
//        $press->written_by=$request->written_by;
        $press->updated_by=Auth::user()->id;
        $press->save();
        if($files=$request->file('picture')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/press',$name);
                $images[]=$name;

                $media=new Media();
                $media->press_release_id=$press->id;
                $media->picture=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $press->picture=$name ;
                    $press->save();
                }

            }
        }
        return redirect()->route('admin.press.index');

    }
    public function show(PressRelease $press)
    {
        abort_unless(\Gate::allows('press_show'), 403);
        $media=Media::where('press_release_id',$press->id)->get();
        return view('admin.press.show',compact('press','media'));

    }
    public function destroy(PressRelease $press)
    {
        abort_unless(\Gate::allows('press_delete'), 403);
        $press->delete();
        return redirect()->route('admin.press.index');
    }

}
