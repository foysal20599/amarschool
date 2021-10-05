<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function index(){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        return view('backEnd.pages.agent.create', compact('divisions'));
    }
    public function store(Request $request){
         $request->validate([
             'name' => 'required|string|max:50',
             'nid_no' => 'required|max:100',
             'email' => 'required|max:50|unique:users',
             'division_id' => 'required',
             'district_id' => 'required',
             'upazilla_id' => 'required',
             'union_id' => 'required',
             'phone_no' => 'required',
             'mother_name' => 'required',
             'father_name' => 'required',
             'password' => 'required|confirmed|min:6',
             'address' => 'required',
             'profile_photo_path' => 'image|mimes:jpg,png,jpeg',
         ]);

            if($file=$request->file('profile_photo_path')){
                $ext = '.'.$file->getClientOriginalExtension();
                $name= Str::slug(trim($file->getClientOriginalName(),$ext)).'-' .time().$ext;
                $file->storeAs('Profile',$name);
                $image='Profile/'.$name;
        }
        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'nid_no' =>  $request->nid_no,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazilla_id' => $request->upazilla_id,
            'union_id' => $request->union_id,
            'phone_no' => $request->phone_no,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'address' => $request->address,
            'profile_photo_path' => $image??null,
            'password' =>Hash::make($request->password),
            'type' => 2,
            'status' => 1,
            'created_at' => date('Y-m-d h:m:i'),
        ]);
        toastr()->success('Agent created successfully!');
        return redirect()->to('agent/manage');
    }
    public function manage(){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $agents = User::where(['type' => 2])->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.agent.manage', compact('divisions', 'agents'));
    }

    public function active($id){
        $user = User::findOrFail($id);
        if($user->status == 1){
            $user->update([
                'status' => 0,
            ]);
        }
        toastr()->warning('User inactive successfully!');
        return redirect()->back();

    }
    public function inactive($id){
        $user = User::findOrFail($id);
        if($user->status == 0){
            $user->update([
                'status' => 1,
            ]);
        }
        toastr()->success('User active successfully!');
        return redirect()->back();
    }
    public function view($id){
        $agent = User::join('divisions', 'divisions.id', 'users.division_id')
        ->join('districts', 'districts.id', 'users.district_id')
        ->join('upazilas', 'upazilas.id', 'users.upazilla_id')
        ->join('unions', 'unions.id', 'users.union_id')
        ->select('divisions.name as div_name', 'districts.name as dist_name', 'upazilas.name as upa_name', 'unions.name as uni_name', 'users.*')
        ->find($id);
        return view('backEnd.pages.agent.view', compact('agent'));
    }

    public function edit($id){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $agent = User::join('divisions', 'divisions.id', 'users.division_id')
        ->join('districts', 'districts.id', 'users.district_id')
        ->join('upazilas', 'upazilas.id', 'users.upazilla_id')
        ->join('unions', 'unions.id', 'users.union_id')
        ->select('divisions.name as div_name', 'divisions.id as div_id', 'districts.name as dist_name', 'districts.id as dist_id', 'upazilas.name as upa_name', 'upazilas.id as upa_id', 'unions.name as uni_name', 'unions.id as uni_id',  'users.*')
        ->find($id);
        return view('backEnd.pages.agent.edit', compact('agent', 'divisions'));

    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:50',
            'nid_no' => 'required|max:100',
            'phone_no' => 'required',
            'mother_name' => 'required',
            'father_name' => 'required',
            'address' => 'required',
            'password' => 'nullable|confirmed|min:6',
            'profile_photo_path' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        $agent = User::find($id);
        if($file=$request->file('profile_photo_path')){
            $filepath = 'storage/app/'. $agent->profile_photo_path;
                if(File::exists($filepath)){
                    File::delete($filepath);
                }
                $ext = '.'.$file->getClientOriginalExtension();
                $name = Str::slug(trim($file->getClientOriginalName(),$ext)).'-' .time().$ext;
                $image_path = $file->storeAs('Profile',$name);
           }
           $agent->update([
            'name' => $request->name,
            'nid_no' => $request->nid_no,
            'email' => $request->email?? $agent->email,
            'division_id' => $request->division_id?? $agent->division_id,
            'district_id' => $request->district_id?? $agent->district_id,
            'upazilla_id' => $request->upazilla_id?? $agent->upazilla_id,
            'union_id' => $request->union_id?? $agent->union_id,
            'phone_no' => $request->phone_no,
            'mother_name' => $request->mother_name,
            'father_name' => $request->father_name,
            'address' => $request->address,
            'password' =>Hash::make($request->password)?? $agent->password,
            'profile_photo_path' => $image_path ??$agent->profile_photo_path,
            'updated_at' => date('Y-m-d h:m:i'),

           ]);

           toastr()->success('Agent Updated successfully!');
           return redirect()->to('agent/manage');
    }
    public function delete($id){
        $agent = User::findOrfail($id);
        $filepath = 'storage/app/'. $agent->profile_photo_path;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $agent->delete();
        toastr()->error('Agent deleted successfully!');
        return redirect()->back();
    }

    public function studentList($id){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $users = Student::with('classname','union.upozilla.district.division')->where('agent_id', $id)->get();
        // $users = User::with('students.classname','students.union.upozilla.district.division')->where('id', $agent_id)->orderBy('id', 'DESC')->first();
        return view('backEnd.pages.agent.studentList', compact('users', 'divisions'));
    }
}
