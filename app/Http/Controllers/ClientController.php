<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function rencanaaksi(){
        return view('admin.rencanaaksi');
    }
}
