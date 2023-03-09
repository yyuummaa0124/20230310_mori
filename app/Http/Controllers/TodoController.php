<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use App\Models\Tag;

class TodoController extends Controller
{
    public function index(){
        $user = Auth::user();
        $todos = $user->todos;
        // dd($todos);
        $param = ['user' =>$user , 'todos' =>$todos];
        return view('index', $param);
    }

    public function create(TodoRequest $request){
    }

    public function update(){
        
    }

    public function delete(){
        
    }

    public function find(){
    
        return view('find');
    }

    public function search(){
    
    }
}
