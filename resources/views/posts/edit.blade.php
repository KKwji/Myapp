<!-- body内だけを表示しています。 -->
<body>
    <h1 class="title">編集画面</h1>
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            @foreach($ingredients as $ingredient)
            <input type="checkbox"  name="ingredient[ingredient][]" value="{{ $ingredient->id }}">{{ $ingredient->ingredient }}
            </input>
            @endforeach
            <div class='content__body'>
                <h2>本文</h2>
            <!--    <input type='text' name='post[body]' value="{{ $post->body }}">-->
                <textarea name="post[body]">{{ $post->body }}</textarea>
                <h2>材料一覧</h2>
                <textarea name="post[In]">{{ $post->In }}</textarea>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
</body>