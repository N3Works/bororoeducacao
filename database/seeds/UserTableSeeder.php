<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'DoWhile',
            'email' => 'admin@dowhile.com.br',
            'password' => bcrypt('dowhile3102'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Bororo25',
            'email' => 'admin@bororo25.com.br',
            'password' => bcrypt('25bororo'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

    }
}
