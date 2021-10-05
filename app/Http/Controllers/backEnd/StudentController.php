<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $class_names = ClassModel::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.AgentPanel.student.create', compact('class_names', 'divisions'));
    }
    public function store(Request $request){
       
     $request->validate([
         'student_name' => 'required|string',
         'date_of_birth' => 'required',
         'phone_no' => 'required|unique:students',
         'class_id' => 'required',
         'religion' => 'required',
         'gender' => 'required',
         'division_id' => 'required',
         'district_id' => 'required',
         'upazilla_id' => 'required',
         'union_id' => 'required',
         'father_name' => 'required|string',
         'mother_name' => 'required|string',
         'password' => 'required|confirmed|min:6',
         'image' => 'nullable|image|mimes:jpg,png,jpeg',
     ]);
 
    if($file=$request->file('image')){
        $ext = '.'.$file->getClientOriginalExtension();
        $name= Str::slug(trim($file->getClientOriginalName(),$ext)).'-' .time().$ext;
        $file->storeAs('Student',$name);
        $image='Student/'.$name;
    }

    $user = new User();
    $user->email = $request->phone_no;
    $user->name = $request->student_name;
    $user->division_id = $request->division_id;
    $user->district_id = $request->district_id;
    $user->upazilla_id = $request->upazilla_id;
    $user->union_id = $request->union_id;
    $user->password = Hash::make($request->password);
    $user->type = 4;
    $user->status = 1;
    $user->is_active = 1;
    $user->save();
    $id = $user->id;
   

   $userid = Auth::user()->id;
    Student::insert([
        'student_name' => $request->student_name,
        'date_of_birth' => $request->date_of_birth,
        'phone_no' => $request->phone_no,
        'class_id' => $request->class_id,
        'religion' => $request->religion,
        'gender' => $request->gender,
        'father_name' => $request->father_name,
        'mother_name' => $request->mother_name,
        'address' => $request->address,
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'upazilla_id' => $request->upazilla_id,
        'union_id' => $request->union_id,
        'agent_id' => $userid,
        'status' => 1,
        'is_active' => 1,
        'user_id' =>  $id,
        'image' => $image??null,
        'created_at' => date('Y-m-d h:m:i'),
    ]);
   
        toastr()->success('Student created successfully!');
        return redirect()->to('student/manage');

    }
    public function manage(){
        $id = Auth::user()->id;
        $users = Student::with('classname','union.upozilla.district.division')->where('agent_id', $id)->get();
        return view('backEnd.pages.AgentPanel.student.manage', compact('users'));
    }

    public function view($id){
        $student = Student::find($id);
        $user = User::with('student.classname','student.union.upozilla.district.division')->where('id', $student->user_id)->first();
        return view('backEnd.pages.AgentPanel.student.view', compact('user'));
    }
    
    public function active($id){
        $student = Student::findOrFail($id);
        if($student->status == 1){
            $student->update([
                'status' => 0,
            ]);
        }
        toastr()->warning('Student inactive successfully!');
        return redirect()->back();

    }
    public function inactive($id){
        $student = Student::findOrFail($id);
        return $student;
        if($student->is_active == 0){
            toastr()->warning('Before permission supper admin!');
            return redirect()->back();
        }else{
            if($student->status == 0){
                $student->update([
                    'status' => 1,
                ]);
            }
            toastr()->success('Student active successfully!');
            return redirect()->back();
        }
    }
    public function edit($id){
        $student = Student::find($id);
        $user = User::with('student.classname')->where('id', $student->user_id)->first();
        $class_names = ClassModel::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.AgentPanel.student.edit', compact('user', 'class_names'));
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
            'name' => $request->student_name,
            'phone_no' => $request->phone_no,
            'password' =>Hash::make($request->password),
        ]);
        toastr()->success('Student Updated successfully!');
        return redirect()->to('student/manage');
    }

    public function delete($id){   
        $student = Student::find($id);
        $user = User::with('student.classname')->where('id', $student->user_id)->first();
        $user->delete();
        $filepath = 'storage/app/'. $student->image;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $student->delete();
        toastr()->error('Student deleted successfully!');
        return redirect()->back();
    }
    
}
