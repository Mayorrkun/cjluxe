<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);

        User::create([
                'first_name' => 'Mayokun',
                'last_name' => 'Testing',
                'email' => 'mayokun@test.com',
                'password' => Hash::make('password'),
        ]
        );

        $test_user = User::where('email', 'mayokun@test.com')->first();
        $test_user->assignRole('admin');

        $this->call(CategorySeeder::class);

        $this->call(ProductSeeder::class);
    }
}
