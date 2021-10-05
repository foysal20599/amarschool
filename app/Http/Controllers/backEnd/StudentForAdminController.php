<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentForAdminController extends Controller
{
    public function manage(){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $users = Student::with('classname','union.upozilla.district.division','agent')->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.studentforadmin.manage', compact('users', 'divisions'));
    }
    public function view($id){
        $user = Student::with('classname','union.upozilla.district.division','agent')->find($id);
        return view('backEnd.pages.studentforadmin.view', compact('user'));
    }
    public function edit($id){
        $user = Student::with('classname','union.upozilla.district.division')->find($id);
        $class_names = ClassModel::where('status', 1)->orderBy('id', 'DESC')->get();
       return view('backEnd.pages.studentforadmin.edit', compact('user', 'class_names'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'student_name' => 'required|string',
            'date_of_birth' => 'required',
            'phone_no' => 'nullable',
            'class_id' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'password' => 'nullable|confirmed|min:6',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        $student = Student::find($id);
        $user_id = Student::find($id)->user_id;
        $user = User::where('id', $user_id)->first();  
        if($file=$request->file('image')){
            $filepath = 'storage/app/'. $student->image;
                if(File::exists($filepath)){
                    File::delete($filepath);
                }
                $ext = '.'.$file->getClientOriginalExtension();
                $name = Str::slug(trim($file->getClientOriginalName(),$ext)).'-' .time().$ext;
                $image_path = $file->storeAs('Student',$name);
           }
           $student->update([
            'student_name' => $request->student_name,
            'date_of_birth' => $request->date_of_birth,
            'phone_no' => $request->phone_no,
            'class_id' => $request->class_id,
            'religion' => $request->religion,
            'gender' => $request->gender,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'address' => $request->address,
            'image' => $image_path?? $student->image,
            'updated' => date('Y-m-d h:m:i'),
        ]);
        $user->update([
            'phone_no' => $request->phone_no,
            'password' =>Hash::make($request->password),
        ]);
        toastr()->success('Student Updated successfully!');
        return redirect()->to('student/managefor/admin');
    }

    public function active($id){
        $student = Student::findOrFail($id);
        if($student->is_active == 1){
            $student->update([
                'is_active' => 0,
                'status' => 0,
            ]);
        }
        toastr()->warning('Student inactive successfully!');
        return redirect()->back();

    }
    public function inactive($id){
        $student = Student::find($id);
        if($student->is_active == 0){
            $student->update([
                'is_active' => 1,
                'status' => 1,
            ]);
        }
        toastr()->success('Student active successfully!');
        return redirect()->back();
    }
    public function delete($id){
        $user = Student::find($id);
        $user_id = Student::find($id)->user_id;
        $student = User::where('id', $user_id)->first();
        $filepath = 'storage/app/'. $user->image;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $user->delete();
        $student->delete();
        toastr()->error('Student deleted successfully!');
        return redirect()->back();
    }
}
