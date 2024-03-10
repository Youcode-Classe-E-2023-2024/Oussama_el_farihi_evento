<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function getStats() {
        $totalUsers = User::count();
        $totalEvents = Event::count();

        
        // dd($totalEvents, $totalUsers);
        return view('admin.index', compact('totalUsers', 'totalEvents',));
    }
    
}
