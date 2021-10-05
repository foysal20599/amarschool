<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Union;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    public function index(){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        return view('backEnd.pages.union.create', compact('divisions'));
    }
    public function getDistrictList(Request $request){
        $districts = DB::table('districts')
        ->where("division_id",$request->division_id)
        ->pluck("name","id");
        return response()->json($districts);
    }
    public function getUpazilaList(Request $request){
        $districts = DB::table("upazilas")
        ->where("district_id",$request->district_id)
        ->pluck("name","id");
        return response()->json($districts);
    }
    public function getUnionList(Request $request){
        $unions = DB::table("unions")
        ->where("upazilla_id",$request->upazilla_id)
        ->pluck("name","id");
        return response()->json($unions);
    }

    public function store(Request $request){
        $request->validate([
            'upazilla_id' => 'required',
            'name' => 'required',
        ],[
            'upazilla_id.required' => 'Upazilla name is required!'
        ]);
        DB::table("unions")->insert([
            'upazilla_id' => $request->upazilla_id,
            'name' => $request->name,
        ]);
        toastr()->success('Union added successfully!');
        return redirect()->back();
        
    }
    public function manage(){
        $unions = Union::with('upozilla.district.division')->get();
        $divisions = DB::table('divisions')->select("id", "name")->get();
        return view('backEnd.pages.union.manage', compact('unions', 'divisions'));
    }

    public function delete($id){
        $union = Union::findOrFail($id);
        $union->delete();
        toastr()->error('Union deleted successfully!');
        return redirect()->back();
    }
    public function edit($id){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $union = Union::findOrFail($id);
        return view('backEnd.pages.union.edit', compact('union', 'divisions'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required',
        ],[
            'upazilla_id.required' => 'Upazilla name is required!'
        ]);
        $union = Union::findOrFail($id);
        $union->update([
            'upazilla_id' => $request->upazilla_id?? $union->upazilla_id,
            'name' => $request->name,
        ]);
        toastr()->success('Union Updated successfully!');
        return redirect()->to('manage/union');
    }


    public function fatchdataall(){
        $unions = Union::with('upozilla.district.division')->get();
         $data  = response()->json($unions);
         return $data;
    //    response()->json([
    //         'unions' => $unions,
    //     ]);
    //     // return $data;
        
    }
}
