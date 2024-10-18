<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapCtrl extends Controller
{

        function map(){
        $buildings = \App\Models\Admin\Building::all();
        return view('admin.map', compact('buildings'));

        }

}
