<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostService;

class PostController extends Controller
{
    protected $service;

    /**
     * Undocumented function
     *
     * @param PostService $service
     */
    public function __construct(PostService $service)
    {
        \Log::debug(__CLASS__ . '::' . __FUNCTION__ . ' called:(' . __LINE__ . ')');
        $this->service = $service;
    }

    /**
     * 投稿の一覧と投稿の一覧を返すViewを返すアクションメソッド
     *
     * @return void
     */
    public function index()
    {
        $posts = $this->service->getPosts();

        return view('welcome', [
            'posts' => $posts,
            'pusher_app_key' => env('MIX_PUSHER_APP_KEY'),
            'pusher_app_cluster' => env('MIX_PUSHER_APP_CLUSTER')
        ]);
    }

    /**
     * 投稿を追加するアクションメソッド
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->service->addPost($request);
        return redirect()->route('post.index');
    }
}
