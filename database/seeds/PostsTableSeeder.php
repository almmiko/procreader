<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        DB::table('posts')->insert([
            [
            'title' => 'Five Lessons from Scaling Pinterest',
            'link' => 'https://news.greylock.com/five-lessons-from-scaling-pinterest-6a699a889b08',
            'user_id' => 1,
            'category_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'What if you got $1,000 a month, just for being alive? I decided to find out.',
                'link' => 'https://medium.com/basic-income/what-if-you-got-1-000-a-month-just-for-being-alive-i-decided-to-find-out-9e8591976c37',
                'user_id' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'The CSS Box Model Explained by Living in a Boring Suburban Neighborhood',
                'link' => 'https://medium.freecodecamp.com/css-box-model-explained-by-living-in-a-boring-suburban-neighborhood-9a9e692773c1',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Inside the Secret World of Tamagotchi Collectors',
                'link' => 'https://theringer.com/tamagotchi-collectors-bandai-digital-pets-9b946143c747',
                'user_id' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
