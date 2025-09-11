<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['cat_name' => 'Book', 'description' => 'Kategori Book'],
            ['cat_name' => 'artikel', 'description' => 'Kategori artikel'],
        ];

        DB::table('categories')->insert($categories);
    }
}
