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
        //How to create multiple data for a table
        // $this->call(UsersTableSeeder::class);
        // DB::table('names')->insert(
        //     [
        //         'name'=>str_random(10),
        //         'email'=>str_random(10).'@gmail.com',
        //         'password'=>bcrypt('secret'),
        //     ]
        // );

        factory(App\User::class,50)->create();
        $this->call(TestSeeder::class);

        //we can call multiple seeders here

        //to seed only a single seeder use
        //php artisan db:seed --class=TestSeeder
    }
}
