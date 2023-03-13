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
        // dd($todos);
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
        // dd($form);
        Todo::create($form);
        return redirect('/todo');
    }

    public function update(Request $request){
        $form = $request->all();
        unset($form['_token']);
        Todo::find($request->id)->update($form);
        return redirect('/todo');
    }

    public function delete(Request $request){
        
        Todo::find($request->id)->delete();
        return redirect('/todo');
    }

    public function search(){
    
    }
}
