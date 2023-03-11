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
        $tags = Tag::all();
        // dd($tags);
        $param = ['user' =>$user , 'todos' =>$todos ,'tags' =>$tags];
        return view('index', $param);
    }

    public function create(Request $request){

        $form = $request->get('question',[
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'tag_id'  => $request->tag_id,
        ]);
        unset($form['_token']);
        dd($form);
        Todo::creata($form);
        return view('aaa');
        // return redirect('/');
    }

    public function update(){
        
    }

    public function delete(){
        
        Author::find($request->id)->delete();
        return redirect('/');
    }

    public function find(){
    
        return view('find');
    }

    public function search(){
    
    }
}
