<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Position::factory(4)->create();
         \App\Models\User::factory(24)->create([
             'position_id' => function () {
                 return Position::query()->inRandomOrder()->first()->id;
             },
         ]);
    }
}
