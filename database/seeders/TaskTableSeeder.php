<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Task;

use database\factories\TaskFactory;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Defining the number of fake/dummy data to be generated
        Task::factory()->times(10)->create();
    }
}
