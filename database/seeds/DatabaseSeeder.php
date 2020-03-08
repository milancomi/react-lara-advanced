<?php

use App\Story;
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
         $this->call(UsersTableSeeder::class);
         $this->addingStories();
        //  $ php artisan make:seeder UsersTableSeeder
        }

        private function addingStories()
        {
            Story::create([
                'title'=>'naslovv jedan',
                'description'=> 'Need to be able to assin multiple users to a story who will be',
                'due_date'=> now()->addDay(2),
                'story_point'=>2,
                'story_type'=>'enhancement',
                'user_id'=>1,
                'epic_id'=>1,
            ])->users()->createMany([
                ['user_id'=>2],
                ['user_id'=>1],
                ]);


            Story::create([
                'title'=>'naslovv dva',
                'description'=> 'users to a story who will be',
                'due_date'=> now()->addDay(2),
                'story_point'=>4,
                'story_type'=>'enhancement',
                'user_id'=>1,
                'epic_id'=>1,
            ])->users()->createMany([
                ['user_id'=>2],
                ['user_id'=>1],
                ['user_id'=>3],
                ['user_id'=>4],

            ]);

        }
}
