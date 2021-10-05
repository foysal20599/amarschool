<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\Upload;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function index(){
        $class_item = ClassModel::where('status', 1)->select('class_name', 'id')->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.subAdminPanel.upload.create', compact('class_item'));
    }

    public function upload(Request $request){
        $request->validate([
            'class_id' => 'required',
            'video_path' => 'mimes:jpg,png,jpeg,mp4,mov,ogg',
            'video_status' => 'required|max:150',
        ],[
            'class_id.required' => 'Class name is required',
            'video_path.required' => 'This file is required',
        ]);
        if($file=$request->file('video_path')){
            $ext = '.'.$file->getClientOriginalExtension();
            $name= Str::slug(trim($file->getClientOriginalName(),$ext)).'-' .time().$ext;
            $file->storeAs('Video',$name);
            $video ='Video/'.$name;
    }
        $user = Auth::user()->id;
        Upload::insert([
            'class_id' => $request->class_id,
            'video_path' => $video,
            'video_status' => $request->video_status,
            'user_id' => $user,
            'status' => 1,
        ]);
        toastr()->success('Video uploaded successfully!');
        return redirect()->to('video/manage');
    }

    public function manage(){
        $user = Auth::user()->id;
        $uploads = Upload::where('user_id', $user)
        ->join('class_models', 'class_models.id', 'uploads.class_id')
        ->select('class_models.id as class_id', 'class_models.class_name', 'uploads.*')
        ->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.subAdminPanel.upload.manage', compact('uploads'));
    }

    public function active($id){
        $video = Upload::findOrFail($id);
        if($video->status == 1){
            $video->update([
                'status' => 0,
            ]);
        }
        toastr()->warning('Video inactive successfully!');
        return redirect()->back();

    }
    public function inactive($id){
        $video = Upload::findOrFail($id);
        if($video->status == 0){
            $video->update([
                'status' => 1,
            ]);
        }
        toastr()->success('Video active successfully!');
        return redirect()->back();
    }
    public function delete($id){
        $video = Upload::find($id);
        $filepath = 'storage/app/'. $video->video_path;
        if(File::exists($filepath)){
            File::delete($filepath);
        }
        $video->delete();
        toastr()->error('Video deleted successfully!');
        return redirect()->back();
    }
    public function edit($id){
        $class_item = ClassModel::where('status', 1)->select('class_name', 'id')->orderBy('id', 'DESC')->get();
        $video = Upload::find($id);
        return view('backEnd.pages.subAdminPanel.upload.edit', compact('class_item', 'video'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'class_id' => 'required',
            'video_path' => 'mimes:jpg,png,jpeg,mp4,mov,ogg | max:20000',
        ],[
            'class_id.required' => 'Class name is required',
            'video_path.required' => 'This file is required',
        ]);
        $video = Upload::find($id);
        if($file=$request->file('video_path')){
            $filepath = 'storage/app/'. $video->video_path;
                if(File::exists($filepath)){
                    File::delete($filepath);
                }
                $ext = '.'.$file->getClientOriginalExtension();
                $name = Str::slug(trim($file->getClientOriginalName(),$ext)).'-' .time().$ext;
                $video_path = $file->storeAs('Video',$name);
           }
        $video->update([
            'class_id' => $request->class_id,
            'video_path' => $video_path??$video->video_path,
            'video_status' => $request->video_status,
            'status' => 1,
        ]);
        toastr()->success('Video updated successfully!');
        return redirect()->to('video/manage');
    }
}
