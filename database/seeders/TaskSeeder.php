<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
    {
        $taskId1 = DB::table('tasks')->insertGetId([
            'title' => 'Configurar Servidor Linux',
            'description' => 'Instalar Nginx y MySQL en el VPS',
            'is_completed' => false,
            'category_id' => 1,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        DB::table('task_tag')->insert([
            ['task_id' => $taskId1, 'tag_id' => 1],
            ['task_id' => $taskId1, 'tag_id' => 2],
        ]);

        $taskId2 = DB::table('tasks')->insertGetId([
            'title' => 'Comprar comida del perro',
            'description' => 'Ir al supermercado antes de las 6pm',
            'is_completed' => false,
            'category_id' => 2,
            'created_at' => now(), 
            'updated_at' => now()
        ]);

        DB::table('task_tag')->insert([
            ['task_id' => $taskId2, 'tag_id' => 3], 
        ]);
    }
}
