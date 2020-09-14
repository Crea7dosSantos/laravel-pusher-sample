<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>laravel-pusher-sample</title>
</head>

<body>
    <div>
        <div>
            <h2>投稿一覧</h2>
            @foreach ($posts as $post)
            <p>ID: {{ $post->id }}</p>
            <p>Content: {{ $post->contents }}</p>
            @endforeach
        </div>
        <form id='form'>
            <p>投稿内容</p>
            <input type=”text” id=”input” name="content">
            <button type=”submit” id=”button”>送信</button>
        </form>
    </div>
    <script>
    </script>
</body>

</html>