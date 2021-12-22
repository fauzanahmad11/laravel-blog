<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

    // protected $fillable = [
    //     'title',
    //     'excerpt',
    //     'body'
    // ];

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->whereHas('author', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('body', 'like', '%' . $search . '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            });
        });
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
        // $query->when($filters['author'] ?? false, function ($query, $author) {
        //     $query->whereHas('author', function ($query) use ($author) {
        //         $query->where('username', $author);
        //     });
        // });
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
    // menginisialkan agar makesense ae
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}

// Post::create([
//     'title' => 'Adobe Ilustrator Unggul Yang Sedang Hangat',
//     'category_id' => '1',
//     'slug' => 'adobe-ilustrator-unggul-yang-sedang-hangat',
//     'excerpt' => 'Eveniet pariatur blanditiis accusamus praesentium doloremque, necessitatibus iste culpa repellat corrupti dolorum quia eum dolorem dolore voluptatem ea qui obcaecati error eligendi?',
//     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p>',
//     'published_at' => '2021-10-03 08:59:18'
// ]);
