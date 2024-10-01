<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numPosts = 1;
        for ($i = 0; $i < $numPosts; $i++) {
            Post::factory()->create([
                'title' => fake()->realText(random_int(10, 20)),
                'body' => fake()->realText(random_int(10, 1000)),
            ]);
        }
    }
}
