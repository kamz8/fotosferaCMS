<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post; 
use App\Options;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OptionsTableSeed::class);
       User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => 'admin123',
            'role' => 'admin',
        ]);

    }
}
