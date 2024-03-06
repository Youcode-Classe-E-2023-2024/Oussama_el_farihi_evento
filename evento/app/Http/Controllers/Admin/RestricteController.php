<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestricteController extends Controller
{
    public function index(){
        return view('admin.restricte.index');
    }
}
