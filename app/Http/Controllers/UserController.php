<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard(Request $request){
        $status = $request->status;
        $priority = $request->priority;

        $query = Auth::user()->tasks();

        if($status){
             $query->where('status', $status);
        }
        if($priority){
            $query->where('priority', $priority);
        }
        $tasks = $query->get();

        return view('user.dashboard',compact('tasks','status','priority'));
    }
}
