<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>laravel-pusher-sample</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body>
    <div>
        <div>
            <h2>投稿一覧</h2>
            @foreach ($posts as $post)
            <p>ID: {{ $post->id }}</p>
            <p>Content: {{ $post->content }}</p>
            @endforeach
        </div>
        <form id='form' action="{{ route('post.store') }}" method="post">
            @csrf
            <p>投稿内容</p>
            <input type=”text” id=”input” name="content">
            <button type=”submit” id=”button”>送信</button>
        </form>
    </div>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('1b917830469415ec57ef', {
            cluster: 'ap3'
        });

        var channel = pusher.subscribe('my-channel')
        channel.bind('my-event', function(data) {
            alert(JSON.stringify(data))
        });
    </script>
</body>

</html>