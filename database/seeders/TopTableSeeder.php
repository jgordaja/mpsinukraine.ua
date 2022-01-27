<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Top::insert([
            [
                'name' => 'off'
            ],
            [
                'name' => 'on'
            ]
        ]);
    }
}
