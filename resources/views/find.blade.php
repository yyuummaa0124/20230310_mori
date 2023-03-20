@extends('layouts.default')
<style>
html, body, div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, caption, tbody, tfoot, thead, th,  article, aside, canvas, details, figcaption, figure, footer, header, hgroup, menu, nav, section, summary, time, mark, audio, video {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
    vertical-align: baseline;
    background: transparent;
}
.container {
  background-color: #2d197c;
  height: 100vh;
  width: 100vw;
  position: relative;
}
.card__header {
  display: flex;
  justify-content: space-between;
}
.card {
  background-color: #fff;
  width: 50vw;
  padding: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 10px;
}
.card__title{
  font-weight: bold;
  font-size: 24px;
}
.auth {
  display: flex;
  align-items: center;
  font-size: 16px;
}
.input-add {
  width: 75%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  appearance: none;
  font-size: 14px;
  outline: none;
}
.btn {
  text-align: left;
  font-size: 12px;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}
.btn-search {
  display: inline-block;
  border: 2px solid #cdf119;
  color: #cdf119;
  text-decoration: none;
  margin-bottom: 10px;
}
.input-update {
  width: 90%;
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  appearance: none;
  font-size: 14px;
  outline: none;
}
input, select {
  vertical-align: middle;
}
.btn-logout {
  border: 2px solid #FF0000;
  color: #FF0000;
}
.btn-add {
  border: 2px solid #dc70fa;
  color: #dc70fa;
}
.btn-update {
  border: 2px solid #fa9770;
  color: #fa9770;
}
.btn-delete {
  border: 2px solid #71fadc;
  color: #71fadc;
}
tr {
  height: 50px;
}
.auth>.detail {
  margin-right: 1rem;
}
.mb-15 {
  margin-bottom: 15px;
}
.mb-30 {
  margin-bottom: 30px;
}
.between {
  justify-content: space-between;
}
.flex {
  display: flex;
}
.select-tag {
  padding: 5px;
  border-radius: 5px;
  border: 1px solid #ccc;
  font-size: 14px;
  outline: none;
}
table{
  width: 100%;
}
.btn-back {
  border: 2px solid #6d7170;
  color: #6d7170;
  background-color: #fff;
  text-decoration: none;
}
</style>
@section('title', 'index.blade.php')

@section('content')
<div class="container">
  <div class="card">
    <div class="card__header">
      <p class="card__title">タスク検索</p>
      <div class="auth mb-15">
        @if (Auth::check())
          <p class="detail">「{{$user->name}}」でログイン中</p>
        @else
          <p>ログインしてください。<a href="/login">ログイン</a>
          <a href="/register">登録</a></p>
        @endif
        <form method="get" action="{{route('logout')}}">
          <input type="hidden" name="_token" value="nctQS6ZbHZn7A9M44XrAwmkg7d1y3Dy19L1e3I5t">     
          <input class="btn btn-logout" type="submit" value="ログアウト">
        </form>
      </div>
    </div>

  <div class="todo">
    <form action="{{route('todo.search')}}" class="flex between mb-30" method="get">
      @csrf
    <input type="text" class="input-add" name="content">
    <select class="select-tag" value="" name="tag_id">
      <option value=""></option>
      @foreach ($tags as $tag)
      <option  value="{{ $tag->id }}" >{{ $tag->name }}</option>
    @endforeach
    <input class="btn btn-add" type="submit" value="検索">
    </form>
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>タグ</th>
        <th>更新</th>
        <th>削除</th>
      </tr>

    @if (!empty($todos))
    @foreach ($todos as $todo)
    <tr>
      <td>{{$todo->created_at}}</td>

      <form action="{{route('todo.update',['id' => $todo->id])}}" method="post">
        @csrf
      <td><input type="text" value="{{$todo->content}}" class="input-update" name="content"></td>
      <td><select class="select-tag" name="tag_id">
        @foreach ($tags as $tag)
      <option value="{{ $tag->id }}" {{ ( $tag->id == $todo->tag->id) ? 'selected' : '' }}>{{$tag->name}}</option>
      @endforeach
      </select></td>
      <td><input class="btn btn-update" type="submit" value="更新"></td>
      </form>

      <form action="{{route('todo.delete', ['id' => $todo->id])}}" method="post">
        @csrf
      <td><input class="btn btn-delete" type="submit" value="削除"></td>
      </form>
    </tr>
    @endforeach
    @endif
    </table>
  </div>
    <a  class="btn btn-back" href={{ route('todo.index') }}>戻る</a>
  </div>
</div>
@endsection