<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>みんなのレシピ</h1>
        <form action="/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="category">
            <h2>カテゴリー</h2>
            
            @foreach($ingredients as $ingredient)
            <input type="checkbox"  name="ingredient[]" value="{{ $ingredient->id }}">{{ $ingredient->ingredient }}
            </input>
            @endforeach
         
    </div>
            <div class="title">
                <h2>レシピのタイトル</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
            </div>
            <div class="body">
                <h4>本文</h4>
                <textarea name="post[body]" placeholder="制作方法を入力してください" style="white-space:pre-wrap;">{{ old('post.body') }}</textarea>
                <p>材料(1人前)</p>
                <textarea name="post[In]" placeholder="材料を入力してください" style="white-space:pre-wrap;">{{ old('post.In') }}</textarea>
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
             
            <div class="image">
                <input type="file" name="image">
            </div>
            <h3>制作者{{Auth::user()->name}}</h3>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
    </body>
</html>