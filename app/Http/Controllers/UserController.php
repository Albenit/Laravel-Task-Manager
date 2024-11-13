<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(){
        $tasks = Auth::user()->tasks()->get();
        return view('user.dashboard',compact('tasks'));
    }
}
