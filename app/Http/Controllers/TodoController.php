<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function create(TodoRequest $request){

        $form = $request->get('question',[
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'tag_id'  => $request->tag_id,
        ]);
        unset($form['_token']);
        // dd($form);
        Todo::create($form);
        return redirect('/');
    }

    public function update(TodoRequest $request){
        $form = $request->all();
        unset($form['_token']);
        Todo::find($request->id)->update($form);
        return redirect('/');
    }

    public function delete(Request $request){
        
        Todo::find($request->id)->delete();
        return redirect('/');
    }

    public function find(){
    
        $user = Auth::user();
        $todos = $user->todos;
        $tags = Tag::all();
        // dd($todos);
        $param = ['user' =>$user , 'todos' =>$todos ,'tags' =>$tags];
        return view('find', $param);
    }

    public function search(Request $request){
        
        $user = Auth::user();
        $searchcontent = $request->input('content');
        $searchtagid = $request->input('tag_id');
        
        $query = Todo::query();

        if (isset($searchcontent)) {
            $query->where('content', 'like', '%' . self::escapeLike($searchcontent) . '%');
        }

        if (isset($searchtagid)) {
            $query->where('tag_id', $searchtagid);
        }

        $todos = $query->get();
        $tags = Tag::all();
        // dd($tags);
        
        $param = ['user' =>$user , 'todos' =>$todos, 'tags' =>$tags];
        return view('find', $param);
    }

    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

    protected function logout() {
	Auth::logout();
	return redirect('login');
    }

}
