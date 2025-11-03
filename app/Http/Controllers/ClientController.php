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
    public function rencanakerja(){
        return view('admin.rencanakerja');
    }
    public function monev(){
        return view('admin.monev');
    }
    public function progres(){
        return view('admin.progres');
    }
    public function profile(){
        return view('admin.profile');
    }
}
