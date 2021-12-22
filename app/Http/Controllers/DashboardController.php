<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Post $post)
    {
        $postTotal = $post->where('user_id', auth()->user()->id)->get()->count();
        return view('dashboard.index', [
            'totalPost' => $postTotal
        ]);
    }
}
