<?php

namespace Database\Seeders;

use App\Models\TypePage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class TypePageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypePage::create([
            'page' => 'dashboard',
            'title' => 'Dashboard',
            'uuid' => (string) Uuid::uuid4()
        ]);

        TypePage::create([
            'page' => 'cap',
            'title' => 'Caixeta Auto Peças',
            'uuid' => (string) Uuid::uuid4()
        ]);

        TypePage::create([
            'page' => 'bap',
            'title' => 'Brumado Auto Peças',
            'uuid' => (string) Uuid::uuid4()
        ]);

        TypePage::create([
            'page' => 'pca',
            'title' => 'PCA Parabrisas',
            'uuid' => (string) Uuid::uuid4()
        ]);
    }
}
