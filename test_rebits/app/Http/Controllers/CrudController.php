<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function index(){
        $data=DB::select(" SELECT * from vehiculos ");
        return view("welcome")->with("data",$data);
    }
}
