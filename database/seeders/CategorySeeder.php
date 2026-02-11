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
                ['name' => 'Trabajo', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Personal', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Estudios', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
}
