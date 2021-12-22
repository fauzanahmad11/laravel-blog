<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Fauzan Ahmad',
            'username' => 'zworld',
            'email' => 'fauzanahmad22@gmail.com',
            'password' => bcrypt('12345')
        ]);
        User::factory(3)->create();
        // User::create([
        //     'name' => 'Dodo Fernando',
        //     'email' => 'deddofernandodo22@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);
        Category::create([
            'name' => 'Design Graphic',
            'slug' => 'design-graphic'
        ]);

        Post::factory(20)->create();
        // Post::create([
        //     'title' => 'Adobe Ilustrator Unggul Yang Sedang Hangat',
        //     'category_id' => '1',
        //     'user_id' => '2',
        //     'slug' => 'adobe-ilustrator-unggul-yang-sedang-hangat',
        //     'excerpt' => 'Eveniet pariatur blanditiis accusamus praesentium doloremque, necessitatibus iste culpa repellat corrupti dolorum quia eum dolorem dolore voluptatem ea qui obcaecati error eligendi?',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium beatae architecto quas odit id ipsam eveniet, maiores laborum laboriosam fugit iusto cum veniam repudiandae aut debitis in mollitia tempora cumque tenetur dolorem et inventore ipsa? Blanditiis, eos. Quia maiores inventore, temporibus saepe rem omnis dolorum nostrum, aspernatur iusto reprehenderit quasi ea! Assumenda, commodi! Atque dolorem similique provident veniam dolores hic mollitia qui in placeat, corporis aliquid tempora ipsa consectetur accusantium obcaecati animi architecto ex deserunt, adipisci odio id voluptas quidem magnam?</p>',
        //     'published_at' => '2021-10-03 08:59:18'
        // ]);
    }
}
