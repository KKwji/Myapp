<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        <h1 class="title_name">みんなのレシピ</h1>
        <h4>ログイン:{{ Auth::user()->name }}</h4>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>{{ $post->title }}</h2>
                    <h5>
                        <a href="/user/{{$post->user_id }}">by {{ $post->user_name }}</a>
                    </h5>
                    <h2 class='title'>
                    @if($post->image_url)
                    <div>
                    <img src="{{ $post->image_url }}" alt="画像が読み込めません。" style="width:300px"/>
                    </div>
                    @endif
                    </h2>
                    @foreach($post->ingredients as $ingredient)
                            <div>カテゴリー:{{$ingredient->ingredient}}</div>
                    @endforeach
                    <a href="/posts/{{ $post->id }}" style="font-size:15px">More</a>
                    
                <!--    <button onclick="like({{$post->id}})" style="width:60px; height:30px;">いいね</button>

                    <!--<a href="/categories/{{ $post->user_name }}">{{ $post->user_name }}</a>-->
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                    @csrf
                    @if( Auth::user()->id == $post->user_id)
                    
                    @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                    
                    
                    
                    @endif
                    </form>
                </div>
            @endforeach
                    <a href='/posts/create'>create</a>
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