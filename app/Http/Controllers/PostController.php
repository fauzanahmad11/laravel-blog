<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        $profil = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category['name'];
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author['name'];
            $profil = ($author['image']);
        }
        // $posts = Post::latest();
        // if (request('search')) {
        //     $posts->filter();
        // }
        return view('posts', [
            'title' => 'All Posts' . $title,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(9)->withQueryString(),
            'active' => 'post',
            'profil' => $profil
            // 'posts' => Post::all()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "title" => "Read",
            "post" => $post,
            'active' => 'post'
        ]);
    }
}
