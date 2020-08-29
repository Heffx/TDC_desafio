<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Usuario',
            'email' => 'user@site.com',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('admins')->insert([
            'name' => 'Administrador',
            'email' => 'admin@site.com',
            'password' => Hash::make('12345678'),
        ]);
        $this->call(StoreSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RankingSeeder::class);
    }
}
