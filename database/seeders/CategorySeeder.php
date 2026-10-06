<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Fiksi', 'description' => 'Buku-buku cerita fiksi, novel, dan karya sastra imajinatif'],
            ['name' => 'Non-Fiksi', 'description' => 'Buku-buku berbasis fakta, biografi, dan sejarah'],
            ['name' => 'Teknologi', 'description' => 'Buku-buku tentang teknologi informasi, pemrograman, dan komputer'],
            ['name' => 'Sains', 'description' => 'Buku-buku ilmu pengetahuan alam, fisika, kimia, dan biologi'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
