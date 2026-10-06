<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = [
            [
                'category_id' => 3,
                'title' => 'Pemrograman Web dengan PHP',
                'author' => 'Lukmanul Hakim',
                'publisher' => 'Lokomedia',
                'year' => 2014,
                'stock' => 9,
            ],
            [
                'category_id' => 1,
                'title' => 'Negeri 5 Menara',
                'author' => 'Ahmad Fuadi',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2009,
                'stock' => 18,
            ],
            [
                'category_id' => 4,
                'title' => 'Kosmos',
                'author' => 'Carl Sagan',
                'publisher' => 'Random House',
                'year' => 1980,
                'stock' => 5,
            ],
            [
                'category_id' => 2,
                'title' => 'Sapiens: Riwayat Singkat Umat Manusia',
                'author' => 'Yuval Noah Harari',
                'publisher' => 'Pustaka Alvabet',
                'year' => 2017,
                'stock' => 14,
            ],
            [
                'category_id' => 1,
                'title' => 'Perahu Kertas',
                'author' => 'Dee Lestari',
                'publisher' => 'Bentang Pustaka',
                'year' => 2009,
                'stock' => 7,
            ],
            [
                'category_id' => 3,
                'title' => 'Belajar Laravel untuk Pemula',
                'author' => 'Muhamad Nauval Azhar',
                'publisher' => 'Leanpub',
                'year' => 2021,
                'stock' => 22,
            ],
            [
                'category_id' => 4,
                'title' => 'Fisika Dasar',
                'author' => 'Halliday & Resnick',
                'publisher' => 'Erlangga',
                'year' => 2010,
                'stock' => 11,
            ],
            [
                'category_id' => 2,
                'title' => 'Atomic Habits',
                'author' => 'James Clear',
                'publisher' => 'Gramedia Pustaka Utama',
                'year' => 2019,
                'stock' => 25,
            ],
            [
                'category_id' => 1,
                'title' => 'Dilan 1990',
                'author' => 'Pidi Baiq',
                'publisher' => 'Pastel Books',
                'year' => 2014,
                'stock' => 13,
            ],
            [
                'category_id' => 4,
                'title' => 'Pengantar Kimia Organik',
                'author' => 'Fessenden & Fessenden',
                'publisher' => 'Erlangga',
                'year' => 2006,
                'stock' => 3,
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
