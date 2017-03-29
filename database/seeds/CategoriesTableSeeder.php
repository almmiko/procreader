<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            [
                'name' => 'habrahabr',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'user_id' => 1
            ],
            [
                'name' => 'uncategorized',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'user_id' => 1
            ]
        ]);
    }
}
