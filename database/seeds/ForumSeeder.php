<?php

use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<10;$i++){
            \App\Forum::create([
                'title'   => 'Title '.$i,
                'content'    => 'Body '.$i,
                'user_id' => 1,
            ]);
        }
    }
}
