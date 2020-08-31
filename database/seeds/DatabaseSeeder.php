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
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'type_user' => 'Admin'
        ]);
        $this->call(StoreSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(RankingSeeder::class);
    }
}
