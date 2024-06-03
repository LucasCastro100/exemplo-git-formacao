<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'photo' => '',
            'remember_token' => Str::random(10),
            'permission_id' => 1,
            'type_page_id' => 1,
            'uuid' => (string) Uuid::uuid4()
        ]);

        User::create([
            'name' => 'Cap',
            'email' => 'cap@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('cap123'),
            'photo' => '',
            'remember_token' => Str::random(10),
            'permission_id' => 2,
            'type_page_id' => 2,
            'uuid' => (string) Uuid::uuid4()
        ]);

        User::create([
            'name' => 'Bap',
            'email' => 'bap@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('bap123'),
            'photo' => '',
            'remember_token' => Str::random(10),
            'permission_id' => 2,
            'type_page_id' => 3,
            'uuid' => (string) Uuid::uuid4()
        ]);

        User::create([
            'name' => 'Pca',
            'email' => 'pca@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pca123'),
            'photo' => '',
            'remember_token' => Str::random(10),
            'permission_id' => 2,
            'type_page_id' => 4,
            'uuid' => (string) Uuid::uuid4()
        ]);
    }
}
