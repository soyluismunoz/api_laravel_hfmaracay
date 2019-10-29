<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Blog::class, 100)->create()->each(
            function(App\blog $blog){
                $blog->tags()->attach([
                    rand(1,5),
                    rand(6,14),
                    rand(15, 20),
                ]);
            }
        
        );
    }
}
