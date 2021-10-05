<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AgentSearchController extends Controller
{
    public function getagentSearch(){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $agents = User::where(['type' => 2])->get();
        return view('backEnd.pages.agent.manage', compact('divisions', 'agents'));
    }

    public function agentSearch(Request $request){
        $divisions = DB::table('divisions')->select("id", "name")->get();
        $agents = User::where(['type' => 2])
        ->where('division_id', 'like', "%{$request->division_id}%")
        ->where('district_id', 'like', "%{$request->district_id}%")
        ->where('upazilla_id', 'like', "%{$request->upazilla_id}%")
        ->where('union_id', 'like', "%{$request->union_id}%")
        ->get();
        return view('backEnd.pages.agent.manage', compact('divisions', 'agents'));
    }
}
