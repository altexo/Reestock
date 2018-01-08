<?php

use Illuminate\Database\Seeder;

class clientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('clients')->insert([
            
            'email' => str_random(10).'@gmail.com',
            'name' => str_random(10),
            'password' => bcrypt('secret'),
        ]);
    }
}
