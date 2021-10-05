<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SubAdminController extends Controller
{
    public function index(){
        return view('backEnd.pages.subAdmin.create');
    }
    public function store(Request $request){
       $request->validate([
        'email' => 'required|max:50|unique:users',
        'password' => 'required|confirmed|min:6',
       ]);
       User::insert([
        'email' => $request->email,
        'password' =>Hash::make($request->password),
        'type' => 3,
        'status' => 1,
        'created_at' => date('Y-m-d h:m:i'),
    ]);
    toastr()->success('Sub-Admin created successfully!');
    return redirect()->to('subadmin/manage');
    }
    public function manage(){
        $subadmins = User::where('type', 3)->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.subAdmin.manage', compact('subadmins'));
    }
    public function edit($id){
        $subadmin = User::find($id);
        return view('backEnd.pages.subAdmin.edit', compact('subadmin'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'password' => 'nullable|confirmed|min:6',
            'profile_photo_path' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        // return $request->all();
        $subadmin = User::findOrFail($id);
        if($file=$request->file('profile_photo_path')){
            $filepath = 'storage/app/'. $subadmin->profile_photo_path;
                if(File::exists($filepath)){
                    File::delete($filepath);
                }
                $ext = '.'.$file->getClientOriginalExtension();
                $name = Str::slug(trim($file->getClientOriginalName(),$ext)).'-' .time().$ext;
                $image_path = $file->storeAs('Sub-Admin',$name);
           }
           $subadmin->update([
            'name' => $request->name?? $subadmin->name,
            'email' => $request->email?? $subadmin->email,
            'phone_no' => $request->phone_no?? $subadmin->phone_no,
            'address' => $request->address?? $subadmin->address,
            'password' =>Hash::make($request->password)?? $subadmin->password,
            'profile_photo_path' => $image_path ??$subadmin->profile_photo_path,
            'updated_at' => date('Y-m-d h:m:i'),

           ]);

           toastr()->success('Sub-Admin Updated successfully!');
           return redirect()->to('subadmin/manage');
    }

    public function active($id){
        $user = User::findOrFail($id);
        if($user->status == 1){
            $user->update([
                'status' => 0,
            ]);
        }
        toastr()->warning('Sub-admin inactive successfully!');
        return redirect()->back();

    }
    public function inactive($id){
        $user = User::findOrFail($id);
        if($user->status == 0){
            $user->update([
                'status' => 1,
            ]);
        }
        toastr()->success('Sub-admin active successfully!');
        return redirect()->back();
    }

    public function delete($id){
        $subadmin = User::findOrfail($id);
        $filepath = 'storage/app/'. $subadmin->profile_photo_path;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $subadmin->delete();
        toastr()->error('Sub-admin deleted successfully!');
        return redirect()->back();
    }
}
