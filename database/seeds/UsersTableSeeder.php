<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Tyler Wigington',
                'email' => 'tylerwigington@boisestate.edu',
                'password' => bcrypt('password')
            ]
        );

        factory(App\User::class, 50)->create();
    }
}