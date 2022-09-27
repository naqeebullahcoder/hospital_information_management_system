<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{
    //

    public function index()
    {
        //abort_unless(\Gate::allows('event_access'), 403);
        // $events=Event::all();
        $settings=Setting::all();
        return view('admin.settings.index',compact('settings'));
    }

    public function create()
    {
        // abort_unless(\Gate::allows('event_create'), 403);
        // $status=Status::get();
        return view('admin.settings.create');
    }

    public function edit($id)
    {
        $settings=new Setting();
        $settings = Setting::where('id', $id)->first();
        return view('admin.settings.edit',compact('settings'));
    }

    public function store(Request $request)
    {
        $settings=new Setting();
        $settings->company_name=$request->company_name;
        $settings->primary_color= $request->primary_color;
        $settings->secondary_color=$request->secondary_color;
        $settings->updated_by=Auth::user()->id;
        $settings->save();

        if($files=$request->file('logo')){
            foreach($files as $key=>$file){
                $name=$file->getClientOriginalName();
                $file->move('public/uploads/settings',$name);
                $images[]=$name;

                $media=new Media();
                $media->doctor_id=$settings->id;
                $media->logo=$name;
                $media->media_type=1;
                $media->save();

                if($key==0)
                {
                    $settings->logo=$name ;
                    $settings->save();
                }

            }
        }

        return redirect()->route('admin.settings.index');
    }

    public function update($id,Request $request)
    {
        $settings=Setting::where('id',$id)->first();
        $settings->company_name = $request->company_name;
        $settings->primary_color= $request->primary_color;
        $settings->secondary_color= $request->secondary_color;
        $settings->logo= $request->logo;
        $settings->save();
        return redirect()->route('admin.settings.index');

    }

    public function show(Setting $settings)
    {
        return view('admin.settings.show',compact('settings'));

    }

    public function destroy(Setting $settings)
    {
        $settings->delete();
        return redirect()->route('admin.settings.index');
    }
}
