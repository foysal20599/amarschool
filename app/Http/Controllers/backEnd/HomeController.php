<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
      
        return view('backEnd.index');
    }
    public function noaccess(){
       return view('backEnd.noaccess');
    }



}
