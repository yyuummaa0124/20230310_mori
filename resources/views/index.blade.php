@extends('layouts.default')
<style>

</style>
@section('title', 'index.blade.php')

@section('content')
@if (Auth::check())
  <p>ログイン中ユーザー: {{$user->name . ' メール' . $user->email . ''}}</p>
@else
  <p>ログインしてください。（<a href="/login">ログイン</a>
  <a href="/register">登録</a>）</p>
@endif

<p class="title">Todo List</p>
<form action="{{route('todo.create')}}" method="POST">
  @csrf
<input type="text" name="content">
<select name="select" value="" name="tag_id">
  @foreach ($tags as $tag)
  <option name="tag_id" value="{{ $todo->tag->id }}" >{{ $tag->name }}</option>
@endforeach
<input type="submit" value="追加">
</form>
<table>
  <tr>
    <th>作成日</th>
    <th>タスク名</th>
    <th>タグ名</th>
    <th>更新</th>
    <th>削除</th>
  </tr>

  @foreach ($todos as $todo)
  <tr>
    <td>{{$todo->created_at}}</td>
    <td>{{$todo->content}}</td>

    <td><select name="select">
    <option value="{{ $todo->tag->id }}" @if(old('tag_id') == $todo->tag->id) selected @endif>{{$todo->tag->name}}</option>
    </select></td>

    <td><input name="" type="submit" value="更新"></td>
    <td><input name="" type="submit" value="削除"></td>
  </tr>
  @endforeach

</table>

@endsection