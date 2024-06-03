<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'permission' => 'Administrador',
            'uuid' => (string) Uuid::uuid4()
        ]);

        Permission::create([
            'permission' => 'Usuário',
            'uuid' => (string) Uuid::uuid4()
        ]);
    }
}
