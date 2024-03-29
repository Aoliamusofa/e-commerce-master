<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'nama' => 'saepul bahri',
            'email' => 'bahrysaipul266@gmail.com',
            'password' => Hash::make('admin098'),
            'role' => 'admin'
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
