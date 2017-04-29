<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'user_id' => User::all()[0]->id,
            'name' => 'Test Task',
            'color' => 'white',
            'position' => 0,
            'is_done' => false
        ]);
    }
}