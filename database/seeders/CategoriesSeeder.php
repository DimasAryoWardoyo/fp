<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Iuran Anggota', 'type' => 'income'],
            ['name' => 'Donasi', 'type' => 'income'],
            ['name' => 'Operasional', 'type' => 'expense'],
            ['name' => 'Kegiatan Sosial', 'type' => 'expense'],
            ['name' => 'Darurat', 'type' => 'expense'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
