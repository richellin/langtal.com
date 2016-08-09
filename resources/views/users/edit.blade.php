@extends('layouts.master')

@section('style')
  @parent
  <style>
  </style>
@stop
@section('content')
    <h1>情報編集</h1>

    <div class="row">
        <div class="col-sm-12">
            <a href="/users" class="btn btn-primary" style="margin:20px;">一覧に戻る</a>
        </div>
    </div>
    <!-- form -->
    {!! Form::open(array('url' => '/users/update/'.$user->id, 'method' => 'post')) !!}
    <form method="post" action="/users/update/{{$user->id}}">
        <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
            <label>名前</label>
            {!! Form::input('text', 'name', $user->name, ['required', 'class' => 'form-control']) !!}
            <span class="help-block">{{$errors->first('name')}}</span>
        </div>
        <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
            <label>E-Mail</label>
            {!! Form::input('text', 'email', $user->email, ['required', 'class' => 'form-control']) !!}
            {{-- <input type="text" name="email" value="{{$user->email}}" class="form-control"> --}}
            <span class="help-block">{{$errors->first('email')}}</span>
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="更新" class="btn btn-primary">
    </form>
    {!! Form::close() !!}
    
    <form method="post" action="/users/destroy/{{$user->id}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="削除" class="btn btn-danger btn-sm btn-destroy">
    </form>
@stop
@section('script')
    @parent
    <script>
        $(function(){
            $(".btn-destroy").click(function(){
                if(confirm("本当に削除しますか？")){
                    return true;
                }else{
                    //cancel
                    return false;
                }
            });
        });
    </script>
@stop