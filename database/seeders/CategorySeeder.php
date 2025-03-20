<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Comic',
                'slug' => 'comic',
            ],
            [
                'name' => 'Novel',
                'slug' => 'novel',
            ],
            [
                'name' => 'Biografi',
                'slug' => 'biografi',
            ],
            [
                'name' => 'Ensiklopedia',
                'slug' => 'ensiklopedia',
            ]
        ]);
    }
}
