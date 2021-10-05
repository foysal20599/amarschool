<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ClassModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index(){
        $all_class = ClassModel::get();
        return response()->json(['all_class' => $all_class], 200);
    }
}
