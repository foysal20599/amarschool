<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentPanelController extends Controller
{
    public function index(){
        $user = User::where('id', Auth::user()->id)->first()->id;
        $class_id = Student::where('user_id', $user)->first()->class_id;
        $all_courses = Upload::with('student')->where('class_id', $class_id)->get();
        return view('backEnd.pages.studentPanel.postShow', compact('all_courses'));
    }

    public function profileEdit(){
        $id = Auth::user()->id;
        $user = User::with('student.classname')->find($id);
        $class_names = ClassModel::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.studentPanel.editProfile', compact('user', 'class_names'));
    }

    public function profileUpdate(Request $request, $id){
        $request->validate([
            'student_name' => 'required|string',
            'date_of_birth' => 'required',
            'class_id' => 'required',
            'religion' => 'required',
            'gender' => 'required',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
        $user = User::with('student.classname')->find($id);
        $student = Student::where('user_id',$id)->first();
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
            'name' => $request->student_name,
        ]);
        toastr()->success('Profile Updated successfully!');
        return redirect()->to('profile');
    }    

    public function viewProfile(){
        $id = Auth::user()->id;
        $user = User::with('student.classname','student.union.upozilla.district.division')->find($id);
        return view('backEnd.pages.studentPanel.viewProfile', compact('user'));
    }
    public function changePassword(){
        return view('backEnd.pages.studentPanel.changePassword');
    }

    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            toastr()->error('Current password does not match!');
            return redirect()->back();
        }

        $user->password = Hash::make($request->password);
        $user->save();

        toastr()->success('Password Updated successfully!');
        return redirect()->to('profile');
    }
}
