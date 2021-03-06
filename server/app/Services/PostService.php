<?php

namespace App\Services;

use App\Events\PostAdded;
use App\Models\Post;
use Illuminate\Http\Request;

class PostService
{
    /**
     * コメント一覧を取得してcollectionを返すメソッド
     *
     * @return object
     */
    public function getPosts()
    {
        $posts = Post::all();
        return $posts;
    }

    /**
     * 投稿を追加するメソッド
     *
     * @param Request $request
     * @return void
     */
    public function addPost(Request $request)
    {
        $new_post = Post::create($request->all());
        event(new PostAdded($new_post));
    }
}
