<?php

namespace App\Models;

class Post
{
    private static $blogPosts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Fauzan Anjay",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis accusamus aperiam vel quia labore velit quasi inventore. Non facilis officia quos facere assumenda modi soluta, odit ad cupiditate tenetur animi blanditiis dignissimos exercitationem dolor neque et, consequuntur accusamus! Ipsam voluptatibus officia inventore itaque beatae, perspiciatis modi eos neque quo quis molestias placeat ab! Consequuntur quidem iste ea id omnis alias enim repellendus voluptate neque! Totam, adipisci rem laboriosam soluta voluptatibus eum similique aperiam ad minus aliquid, unde quas quisquam."
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Dody",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis accusamus aperiam vel quia labore velit quasi inventore. Non facilis officia quos facere assumenda modi soluta, odit ad cupiditate tenetur animi blanditiis dignissimos exercitationem dolor neque et, consequuntur accusamus! Ipsam voluptatibus officia inventore itaque beatae, perspiciatis modi eos neque quo quis molestias placeat ab! Consequuntur quidem iste ea id omnis alias enim repellendus voluptate neque! Totam, adipisci rem laboriosam soluta voluptatibus eum similique aperiam ad minus aliquid, unde quas quisquam.Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate omnis accusamus aperiam vel quia labore velit quasi inventore. Non facilis officia quos facere assumenda modi soluta, odit ad cupiditate tenetur animi blanditiis dignissimos exercitationem dolor neque et, consequuntur accusamus! Ipsam voluptatibus officia inventore itaque beatae, perspiciatis modi eos neque quo quis molestias placeat ab! Consequuntur quidem iste ea id omnis alias enim repellendus voluptate neque! Totam, adipisci rem laboriosam soluta voluptatibus eum similique aperiam ad minus aliquid, unde quas quisquam."
        ]
    ];

    public static function all()
    {
        return collect(self::$blogPosts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        // penerapan fungsi collection dengan menambah fungsi firstwhere

        // $newPost = [];
        // foreach ($posts as $post) {
        //     if ($post["slug"] === $slug) {
        //         $newPost = $post;
        //     }
        // }
        // return $newPost;

        return $posts->firstWhere('slug', $slug);
    }
}
