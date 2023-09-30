<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>投稿一覧</h1>
        <h4>ログイン:{{ Auth::user()->name }}</h4>
        <div class='posts'>
           <!-- <h2>$post->user_name</h2>-->
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>{{ $post->title }}</h2>
                    <h2 class='title'>
                    @if($post->image_url)
                        <div>
                        <img src="{{ $post->image_url }}" alt="画像が読み込めません。" style="width:300px"/>
                        </div>
                    @endif
                    </h2>
                    @foreach($post->ingredients as $ingredient)
                            <div>{{$ingredient->ingredient}}</div>
                    @endforeach
                    <a href="/posts/{{ $post->id }}" style="font-size:15px">More</a>
                    <a href="">{{ $post->user_name}}</a>
                   
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                     @if( Auth::user()->id == $post->user_id)
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    @endif
                    </form>
                </div>
            @endforeach
                    <a href='/'>戻る</a>
        </div>
    <script>
    function deletePost(id) {
    'use strict'
        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
    </body>
</html>