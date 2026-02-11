<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
        {
            DB::table('tags')->insert([
                ['name' => 'Urgente', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Backend', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Diseño', 'created_at' => now(), 'updated_at' => now()],
                ['name' => 'Bug', 'created_at' => now(), 'updated_at' => now()],
            ]);
        }
}
