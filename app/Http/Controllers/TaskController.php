<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function getTaskById($id){
        $task = Auth::user()->tasks()->where('id',$id)->first();
        return $task;
    }


    public function store(StoreTaskRequest $request){
        Auth::user()->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority
        ]);

        return redirect()->route('dashboard')->with('success','Task stored successfuly');
    }

    public function update($id,StoreTaskRequest $request){
        $task = Auth::user()->tasks()->where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority
        ]);

        if(!$task){
            return redirect()->route('dashboard')->with('fail','Task faild to update');
        }

        return redirect()->route('dashboard')->with('success','Task updated successfuly');

    }

    public function delete($id){
        $task = Auth::user()->tasks()->where('id',$id)->delete();

        if(!$task){
            return redirect()->route('dashboard')->with('fail','Task faild to delete');
        }

        return redirect()->route('dashboard')->with('success','Task deleted successfuly');
    }
}
