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
                'first_name' => 'Ezekiel',
                'last_name' => '',
                'email' => 'ceejaylavish@gmail.com',
                'password' => Hash::make('securePass01'),
        ]
        );

        $test_user = User::where('email', 'ceejaylavish@gmail.com')->first();
        $test_user->assignRole('admin');

        $this->call(CategorySeeder::class);

        $this->call(ProductSeeder::class);
    }
}
