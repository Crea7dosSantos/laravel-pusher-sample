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
        return view('welcome', ['posts' => $posts]);
    }

    /**
     * 投稿を追加するアクションメソッド
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $posts = $this->service->addPost($request);
        return view('welcom', $posts);
    }
}