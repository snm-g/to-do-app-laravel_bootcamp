<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Llama a tus seeders en orden (Primero categorías/etiquetas, luego tareas)
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            TaskSeeder::class,
        ]);
    }
}
