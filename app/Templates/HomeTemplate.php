<?php

namespace App\Templates;

use Carbon\Carbon;
use App\Post;
use Illuminate\View\View;

class HomeTemplate extends AbstractTemplate
{
    protected $view = 'blog.home';

    protected $posts;

    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    public function prepare(View $view)
    {
        $posts = $this->posts->with('author')
                             ->where('published_at', '<', Carbon::now())
                             ->orderBy('published_at', 'desc')
                             ->take(3)
                             ->get();

        $view->with('posts', $posts);
    }
}
