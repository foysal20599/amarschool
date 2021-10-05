<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\all;

class SearchController extends Controller
{
    public function getstudentSearch()
    {
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $users = Student::with('classname','union.upozilla.district.division')->get();
        return view('backEnd.pages.studentforadmin.manage', compact('divisions','users'));
    }
    
    public function studentSearch(Request $request){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $users = Student::with('classname','union.upozilla.district.division')
        ->where('division_id', 'like', "%{$request->division_id}%")
        ->where('district_id', 'like', "%{$request->district_id}%")
        ->where('upazilla_id', 'like', "%{$request->upazilla_id}%")
        ->where('union_id', 'like', "%{$request->union_id}%")
        ->get();  
        return view('backEnd.pages.studentforadmin.manage', compact('divisions','users'));
    }
}
