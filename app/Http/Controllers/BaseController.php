<?php

namespace App\Http\Controllers;
use App\Models\ClassModel;
use App\Models\Upload;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        $classes = ClassModel::where('status', 1)->with('upload')->orderBy('id', 'DESC')->get();
        return view('frontEnd.index', compact('classes'));
    }
    public function contact(){
        return view('frontEnd.pages.contact');
    }
    public function about(){
        return view('frontEnd.pages.about');
    }
}
