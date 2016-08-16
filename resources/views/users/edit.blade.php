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
    
    {{-- エラーの表示を追加 --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <!-- form -->
    {{ Form::open(['url' => '/users/update/'.$user->id, 'method' => 'post', 'files' => true]) }}
        <div class="form-group @if(!empty($errors->first('name'))) has-error @endif">
            {{ Form::label('name', 'Name') }}
            @if(!empty($errors->first('name')))
                {{ Form::input('text', 'name', old( 'name' ), ['required', 'class' => 'form-control']) }}
            @else
                {{ Form::input('text', 'name', $user->name, ['required', 'class' => 'form-control']) }}
            @endif
            <span class="help-block">{{$errors->first('name')}}</span>
        </div>
        <div class="form-group @if(!empty($errors->first('email'))) has-error @endif">
            {{ Form::label('email', 'E-Mail') }}
            {{ $user->email }}
            {{ Form::hidden('email', $user->email) }}
            {{-- Form::input('text', 'email', $user->email, ['required', 'class' => 'form-control']) --}}
            {{-- <input type="text" name="email" value="{{ $user->email }}" class="form-control"> --}}
            <span class="help-block">{{$errors->first('email')}}</span>
        </div>
        @for ($i = 1; $i <= 3; $i++)
            {{--*/ $img = "img{$i}"; /*--}}
            
            <div class="form-group @if(!empty($errors->first($img))) has-error @endif">
                {{ Form::label($img, 'Uploade'.$i) }}
                {{ Form::file($img, ['class' => 'img_uploade']) }}
                <span id="{{ $img }}_preview">
                    @if ($user->$img !== '')
                        <img src="/img/{{ $user->id }}/b_{{ $user->$img }}" class="img-responsive">
                    @else
                        <img src="/build/img/b_no_img.jpg" class="img-responsive">
                    @endif
                </span>
                <span class="help-block">{{$errors->first($img)}}</span>
            </div>
        @endfor
        {{ Form::hidden('_token', csrf_token()) }}
        {{ Form::submit('更新', ['class' => 'btn btn-primary']) }}
    {{ Form::close() }}
    
    {{ Form::open(['url' => '/users/destroy/'.$user->id, 'method' => 'post']) }}
        {{ Form::hidden('_token', csrf_token()) }}
        {{ Form::submit('削除', ['class' => 'btn btn-danger btn-sm btn-destroy']) }}
    {{ Form::close() }}
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
            
            $(".img_uploade").on('change', function(){
                readURL(this);
            });
        });
        
        function readURL(input) {
            if (input.files && input.files[0]) {
                
                var img = new Image();
                var reader = new FileReader();
                var file = input.files[0];
                
                var size_limit = 1024*1024*5; // 5MB
            
                //if (!file.type.match(/^image\/(bmp|png|jpeg|gif)$/)){
                if (!file.type.match(/^image\/(png|jpeg)$/)){
                    alert("画像はPNG,JPEG形式のみになります。");
                    $('#'+input.id).val('');
                    return;
                }
                
                if (file.size >= size_limit){
                    alert("画像サイズは5MBまでになります。");
                    $('#'+input.id).val('');
                    return;
                }
                
                /*
                var img_type = file.type.match(/^image\/([a-z]+)$/)[1];
                
                if(img_type == "jpeg"){
                    img_type = "jpg";
                }
                */
                reader.onload = function (e) {
                    id = '#'+input.id + '_preview';
                    $(id).html('');
                    html = '<img id="' + id + '_img" src="' + e.target.result + '" class="img-responsive"/>'
                    $(id).html(html);
                    
                    $(id+ '_img').attr('src', e.target.result);
                }
              reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@stop