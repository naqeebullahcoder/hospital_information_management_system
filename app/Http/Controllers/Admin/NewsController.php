<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Status;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    //

    public function index()
    {
        abort_unless(\Gate::allows('news_access'), 403);
        $news=News::all();
        return view('admin.News.index', compact('news'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('news_create'), 403);
        $news=new News();
        $news->title = $request->title;
        $news->description= $request->description;

        $news->news_link= $request->news_link;
        $news->date=$request->date;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/news', $filename);
            $news->picture=$filename ;

        }
        $news->status=$request->status;
        $news->updated_by=Auth::user()->id;
        $news->save();
        return redirect()->route('admin.news.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('news_create'), 403);
        $status=Status::get();
        return view('admin.News.create',compact('status'));
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('news_edit'), 403);
        $status=Status::get();
        $news=new News();
        $news = News::where('id', $id)->first();
        return view('admin.News.edit',compact('news','status'));
    }
    public function update(News $news,Request $request)
    {
        abort_unless(\Gate::allows('news_edit'), 403);
        $news->title = $request->title;
        $news->description= $request->description;
        $news->news_link= $request->news_link;
        $news->date=$request->date;

        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/news', $filename);
            $news->picture=$filename ;
        }
        $news->status=$request->status;
        $news->updated_by=Auth::user()->id;
        $news->save();
        return redirect()->route('admin.news.index');

    }
    public function destroy(News $news)
    {
        abort_unless(\Gate::allows('news_delete'), 403);
        $news->delete();
        return redirect()->route('admin.news.index');
    }
    public function show(News $news)
    {
        abort_unless(\Gate::allows('news_show'), 403);
        return view('admin.News.show',compact('news'));

    }
}
