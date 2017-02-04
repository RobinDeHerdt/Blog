<?php

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
        DB::table('users')->insert([
            'name'      => 'Robin De Herdt',
            'email'     => 'admin@blog.be',
            'password'  => bcrypt('admin')
        ]);
    }
}
