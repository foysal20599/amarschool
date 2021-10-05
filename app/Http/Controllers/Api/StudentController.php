<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Student;
use App\Models\Upload;
use App\Models\User;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Laravel\Passport\Passport;

class StudentController extends Controller
{
    public function studentLogin(Request $request){
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'email' => 'required|exists:users',
                'password' => 'required',
            ], [
                'email.required' => 'email fil is required',
                'email.exists' => 'Phone number does not exists',
                'password.required' => 'password fil is required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422); 
            }
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                $user = User::where('email', $request->email)->first();
                $access_token = $user->createToken($request->email)->accessToken;
                User::where('email', $request->email)->update(['access_token' => $access_token]);
                $message = "User Login Successfully!";
                return response()->json(['message' => $message, 'access_token' => $access_token], 201);
            }else{
                $message ="Opps! Username or password invalid";
                return response()->json(['message' => $message], 201);
        } 
     } 
    }

    public function showVideo(){
        $id = Auth::user()->id;
        $class_id = Student::where('user_id', $id)->first()->class_id;
        $all_youtube_video = YoutubeVideo::with('student.classname')->where('class_id', $class_id)->orderBy('id', 'DESC')->paginate(1);
        return response()->json(['all_youtube_video' => $all_youtube_video], 202);
    }
    public function studentProfile(){
        $id = Auth::user()->id;
        $student_info = User::with('student.classname','student.union.upozilla.district.division')->find($id);
        return response()->json(['student_info' => $student_info], 202);
    }

    public function countVideo(){
        $id = Auth::user()->id;
        $class_id = Student::where('user_id', $id)->first()->class_id;
        $youtube_video_count = YoutubeVideo::where('class_id', $class_id)->count();
        return response()->json(['youtube_video_count' => $youtube_video_count], 202);
    }

    public function newsVideoShow(){
        $id = Auth::user()->id;
        $class_id = Student::where('user_id', $id)->first()->class_id;
        $news_video = Upload::where('class_id', $class_id)->orderBy('id', 'DESC')->paginate(10);
        return response()->json(['news_video' => $news_video], 202);
    }

    public function newsVideoCount(){
        $id = Auth::user()->id;
        $class_id = Student::where('user_id', $id)->first()->class_id;
        $count_video = Upload::where('class_id', $class_id)->count();
        return response()->json(['count_news_video' => $count_video], 202);
    }
    public function passwordChange(Request $request){
        $data = $request->all();
        return response()->json(['data' => $data]);

            if($request->isMethod('post')){
                $validator = Validator::make($request->all(), [
                    'current_password' => 'required',
                    'password' => 'required|string|min:6|confirmed',
                    'password_confirmation' => 'required',
                ], [
                    'current_password.required' => 'Current password fill is required',
                    'password.required' => 'Password fill is required',
                    'min.required' => 'Password at least 6 charctor',
                    'confirmed.required' => 'Confiem password is required',
                    'password_confirmation.required' => 'Confirm password does not match',
                ]);
                if ($validator->fails()) {
                    return response()->json($validator->errors(), 422); 
                }
                $user = Auth::user();
                if (!Hash::check($request->current_password, $user->password)) {
                    $message = "Current password does not match!";
                    return response()->json(['message' => $message], 407);
                }
                $user->password = Hash::make($request->password);
                $user->save();
                return response()->json(['message' => 'Password Updated Successfully!']);
                
        } 
    }
   
}
