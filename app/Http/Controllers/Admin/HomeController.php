<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        return view('admin/index');

    }
    public function profile(){

        return view('admin/profile');
    }



}
