<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Illuminate\Database\Eloquent\->unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(BlogPostSeeder::class);
    }
}
