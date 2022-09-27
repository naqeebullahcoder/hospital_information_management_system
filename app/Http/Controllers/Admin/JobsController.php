<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\JobTypes;
use App\Jobs;
use App\Status;

use Illuminate\Support\Facades\Auth;

class JobsController extends Controller
{
    //

    public function index()
    {
        abort_unless(\Gate::allows('jobs_access'), 403);
        $jobs=Jobs::all();
        return view('admin.Jobs.index', compact('jobs'));
    }
    public function store(Request $request)
    {
        abort_unless(\Gate::allows('jobs_create'), 403);
          $jobs=new Jobs();
          $jobs->title=$request->title;
          $jobs->type=$request->type;
          $jobs->opening_date=$request->opening_date;
          $jobs->closing_date=$request->closing_date;
          if($request->hasfile('file'))
          {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/jobs', $filename);
            $jobs->file=$filename ;

          }
          $jobs->status=$request->status;
          $jobs->updated_by=Auth::user()->id;
          $jobs->save();

        return redirect()->route('admin.jobs.index');
    }

    public function create()
    {
        abort_unless(\Gate::allows('jobs_create'), 403);
        $status=Status::get();
        $job_types= new JobTypes();
        $job_types=JobTypes::get();
        return view('admin.Jobs.create',compact('job_types','status'));
    }

    public function edit($id)
    {
        abort_unless(\Gate::allows('jobs_edit'), 403);
        $status=Status::get();
        $job_types= new JobTypes();
        $job_types=JobTypes::get();
        $jobs=new Jobs();
        $jobs = Jobs::where('id', $id)->first();
        return view('admin.Jobs.edit',compact('jobs','job_types','status'));
    }
    public function update(Jobs $job,Request $request)
    {
        abort_unless(\Gate::allows('jobs_edit'), 403);
        $job->title=$request->title;
        $job->type=$request->type;
        $job->opening_date=$request->opening_date;
        $job->closing_date=$request->closing_date;
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/uploads/jobs', $filename);
            $job->file=$filename ;

        }
        $job->status=$request->status;
        $job->updated_by=Auth::user()->id;
        $job->save();
        return redirect()->route('admin.jobs.index');


    }
    public function destroy(Jobs $job)
    {
        abort_unless(\Gate::allows('jobs_delete'), 403);
        $job->delete();
        return redirect()->route('admin.jobs.index');
    }
    public function status(Jobs $job)
    {
        dd($job->id);
    }

}
