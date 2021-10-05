<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use App\Models\YoutubeVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YoutubeVideoContorller extends Controller
{
    public function index(){
        $class_item = ClassModel::where('status', 1)->select('class_name', 'id')->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.youtubevideo.create', compact('class_item'));
    }
    public function store(Request $request){
        $request->validate([
            'class_id' => 'required',
            'video_title' => 'required',
            'video_link' => 'required',
        ],[
            'class_id.required' => 'Class name is required',
            'video_title.required' => 'This video title is required',
        ]);
        $user = Auth::user()->id;
        $video = new YoutubeVideo();
        $video->class_id = $request->class_id;
        $video->video_title = $request->video_title;
        $video->video_link = $request->video_link;
        $video->user_id = $user;
        $video->status = 1;
        $video->save();
        toastr()->success('Video uploaded successfully!');
        return redirect()->to('youtube/video/manage');
    }
    public function manage(){
        $user = Auth::user()->id;
        $uploads = YoutubeVideo::where('user_id', $user)
        ->join('class_models', 'class_models.id', 'youtube_videos.class_id')
        ->select('class_models.id as class_id', 'class_models.class_name', 'youtube_videos.*')
        ->orderBy('id', 'DESC')->get();
        return view('backEnd.pages.youtubevideo.manage', compact('uploads'));
    }
    public function active($id){
        $video = YoutubeVideo::findOrFail($id);
        if($video->status == 1){
            $video->update([
                'status' => 0,
            ]);
        }
        toastr()->warning('Video inactive successfully!');
        return redirect()->back();

    }
    public function inactive($id){
        $video = YoutubeVideo::findOrFail($id);
        if($video->status == 0){
            $video->update([
                'status' => 1,
            ]);
        }
        toastr()->success('Video active successfully!');
        return redirect()->back();
    }
    public function delete($id){
        $video = YoutubeVideo::find($id);
        $video->delete();
        toastr()->error('Video deleted successfully!');
        return redirect()->back();
    }
    public function edit($id){
        $class_item = ClassModel::where('status', 1)->select('class_name', 'id')->orderBy('id', 'DESC')->get();
        $video = YoutubeVideo::find($id);
        return view('backEnd.pages.youtubevideo.edit', compact('video', 'class_item'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'class_id' => 'required',
            'video_title' => 'required',
            'video_link' => 'required',
        ],[
            'class_id.required' => 'Class name is required',
            'video_title.required' => 'This video title is required',
        ]);
        $video = YoutubeVideo::find($id);
        $video->class_id = $request->class_id;
        $video->video_title = $request->video_title;
        $video->video_link = $request->video_link;
        $video->save();
        toastr()->success('Video Updated successfully!');
        return redirect()->to('youtube/video/manage');
    }

}
