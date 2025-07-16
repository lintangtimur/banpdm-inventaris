<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            ['name' => 'Elektronik'],
            ['name' => 'Alat Tulis Kantor'],
            ['name' => 'Furnitur'],
            ['name' => 'Komputer & Aksesoris'],
            ['name' => 'Kebersihan'],
            ['name' => 'Lainnya'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
