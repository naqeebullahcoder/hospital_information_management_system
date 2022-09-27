<?php


namespace App\Http\Controllers\Admin;


use App\Department;
use App\DepartmentUser;
use App\Designation;
use App\FacultyMembers;
use App\Http\Controllers\Controller;
use App\FacultyMemberTypes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class FacultyMembersController extends Controller
{
    public function index()
    {
//        abort_unless(\Gate::allows('faculty_resource_access'), 403);
        $departments=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');


        if($departments->count()>0)
        {
            $faculty_resources  = FacultyMembers::wherein('department_id',$departments)->get();
        }
        else
        {
            $faculty_resources  = FacultyMembers::where('user_id',Auth::user()->id)->get();
        }

        return view('admin.FacultyMembers.index', compact('faculty_resources'));
    }

    public function show($id)
    {
//        abort_unless(\Gate::allows('faculty_resource_show'), 403);
        $faculty_resource=FacultyMembers::find($id);
        return view('admin.FacultyMembers.show', compact('faculty_resource'));
    }
    public function store(Request $request)
    {
//        abort_unless(\Gate::allows('faculty_resource_create'), 403);
        $faculty_resource=new FacultyMembers();
        $faculty_resource->designation_id=$request->designation_id;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/faculty-members-pictures/', $filename);
            $faculty_resource->picture=$filename ;

        }
        $faculty_resource->user_id=$request->user_id;
        $faculty_resource->qualification=$request->qualification;
        $faculty_resource->department_id=$request->department_id;
        $faculty_resource->faculty_member_type_id=$request->faculty_member_type_id;
        $faculty_resource->biography=$request->biography;
        $faculty_resource->save();

        return redirect()->route('admin.faculty-members.index');
    }
    public function create()
    {
//        abort_unless(\Gate::allows('faculty_resource_create'), 403);
        $designations=Designation::all();
        $department_ids=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $departments=Department::wherein('id',$department_ids)->get();
        $faculty_member_types=FacultyMemberTypes::all();
        return view('admin.FacultyMembers.create',compact('designations','departments','faculty_member_types'));
    }

    public function edit($id)
    {
//        abort_unless(\Gate::allows('faculty_resource_edit'), 403);
        $designations=Designation::all();
        $department_ids=DepartmentUser::where('user_id',Auth::user()->id)->pluck('department_id');
        $departments=Department::wherein('id',$department_ids)->get();
        $faculty_member_types=FacultyMemberTypes::all();
        $faculty_resource=FacultyMembers::where('id',$id)->first();
        return view('admin.FacultyMembers.edit',compact('designations','departments','faculty_member_types','faculty_resource'));
    }
    public function update(FacultyMembers $facultyMember,Request $request)
    {
//        abort_unless(\Gate::allows('faculty_resource_edit'), 403);

        $facultyMember->designation_id=$request->designation_id;
        if($request->hasfile('picture'))
        {
            $file = $request->file('picture');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('public/faculty-members-pictures/', $filename);
            $facultyMember->picture=$filename ;

        }

        $facultyMember->user_id=$request->user_id;
        $facultyMember->qualification=$request->qualification;
        $facultyMember->department_id=$request->department_id;
        $facultyMember->faculty_member_type_id=$request->faculty_member_type_id;
        $facultyMember->joining_date=$request->joining_date;
        $facultyMember->dob=$request->dob;
        $facultyMember->biography=$request->biography;
        $facultyMember->cnic=$request->cnic;
        $facultyMember->license_no=$request->license_no;
        $facultyMember->specialization=$request->specialization;
        $facultyMember->mobile_no=$request->mobile_no;
        $facultyMember->phone_no=$request->phone_no;
        $facultyMember->fee=$request->fee;
        $facultyMember->address=$request->address;
        $facultyMember->save();


        return redirect()->route('admin.faculty-members.index');

    }
    public function destroy(FacultyMembers $facultyMember)
    {
//        abort_unless(\Gate::allows('faculty_resource_delete'), 403);
        $facultyMember->delete();
        return back();
    }

    public function search()
    {
        $departments=Department::orderby('name')->get();
        $selected_department = Input::get ( 'department' );
        $name = Input::get ( 'name' );
        if($selected_department==0 && (isset($name)))
        {
//            dd('just name set');
            $faculty_members=FacultyMembers::join('designations','designations.id','=','faculty_members.designation_id')->join('users','users.id','=','faculty_members.user_id')->Where('users.name', 'like', '%' . $name . '%')->select('faculty_members.id','faculty_members.name' ,'faculty_members.designation_id', 'faculty_members.picture', 'faculty_members.email' ,'faculty_members.user_id' ,'faculty_members.qualification' ,'faculty_members.department_id' ,'faculty_members.faculty_member_type_id' ,'faculty_members.biography')->orderby('designations.priority','ASC')->orderby('faculty_members.joining_date','ASC') ->orderby('faculty_members.dob','ASC')->get();
        }
        if($selected_department==0 && !(isset($name)))
        {
//            dd('all departmets');
            $faculty_members=FacultyMembers::join('designations','designations.id','=','faculty_members.designation_id')->select('faculty_members.id','faculty_members.name' ,'faculty_members.designation_id', 'faculty_members.picture', 'faculty_members.email' ,'faculty_members.user_id' ,'faculty_members.qualification' ,'faculty_members.department_id' ,'faculty_members.faculty_member_type_id' ,'faculty_members.biography')->orderby('designations.priority','ASC')->orderby('faculty_members.joining_date','ASC') ->orderby('faculty_members.dob','ASC')->get();
//            dd($faculty_members);
        }
        elseif(isset($selected_department)&& $selected_department!=0 &&isset($name))
        {
//            dd('both set');
            $faculty_members=FacultyMembers::join('designations','designations.id','=','faculty_members.designation_id')->join('users','users.id','=','faculty_members.user_id')->where('department_id',$selected_department)->Where('users.name', 'like', '%' . $name . '%')->select('faculty_members.id','faculty_members.name' ,'faculty_members.designation_id', 'faculty_members.picture', 'faculty_members.email' ,'faculty_members.user_id' ,'faculty_members.qualification' ,'faculty_members.department_id' ,'faculty_members.faculty_member_type_id' ,'faculty_members.biography')->orderby('designations.priority','ASC')->orderby('faculty_members.joining_date','ASC') ->orderby('faculty_members.dob','ASC')->get();
        }
        elseif(isset($selected_department)&&!(isset($name)))
        {
//            dd('department set');
            $faculty_members=FacultyMembers::join('designations','designations.id','=','faculty_members.designation_id')->where('department_id',$selected_department)->select('faculty_members.id','faculty_members.name' ,'faculty_members.designation_id', 'faculty_members.picture', 'faculty_members.email' ,'faculty_members.user_id' ,'faculty_members.qualification' ,'faculty_members.department_id' ,'faculty_members.faculty_member_type_id' ,'faculty_members.biography')->orderby('designations.priority','ASC')->orderby('faculty_members.joining_date','ASC') ->orderby('faculty_members.dob','ASC')->get();
        }

        return view('website.faculty-resources',compact('faculty_members','departments','selected_department','name'));

    }

}
