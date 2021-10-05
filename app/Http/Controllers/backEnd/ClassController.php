<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
        return view('backEnd.pages.class.create');
    }
    public function store(Request $request){
        $request->validate([
            'class_name' => 'required'
        ]);
        ClassModel::insert([
            'class_name' => $request->class_name,
            'status' => 1,
            'created_at' => date("Y-m-d h:m:i"),
        ]);
        toastr()->success('Class created successfully!');
        return redirect()->to('class/manage');
    }
    public function manage(){
        $class_item = ClassModel::orderBy('id', 'DESC')->get();
        return view('backEnd.pages.class.manage', compact('class_item'));
    }

    public function active($id){
        $class = ClassModel::findOrFail($id);
        if($class->status == 1){
            $class->update([
                'status' => 0,
            ]);
        }
        toastr()->warning('Class inactive successfully!');
        return redirect()->back();

    }
    public function inactive($id){
        $class = ClassModel::findOrFail($id);
        if($class->status == 0){
            $class->update([
                'status' => 1,
            ]);
        }
        toastr()->success('Class active successfully!');
        return redirect()->back();
    }
    public function delete($id){
        $class = ClassModel::findOrFail($id);
        $class->delete();
        toastr()->error('Class deleted successfully!');
        return redirect()->back();
    }
    public function edit($id){
        $class_item = ClassModel::findOrFail($id);
        return view('backEnd.pages.class.edit', compact('class_item'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'class_name' => 'required'
        ]);
        $class_item = ClassModel::findOrFail($id);
        $class_item->update([
            'class_name' => $request->class_name,
            'status' => 1,
            'updated_at' => date("Y-m-d h:m:i"),
        ]);
        toastr()->success('Class updated successfully!');
        return redirect()->to('class/manage');
    }
}
