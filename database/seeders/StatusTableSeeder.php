<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Status::insert([
            [
                'id' => 0,
                'name' => 'unpublish'
            ],
            [
                'id' => 1,
                'name' => 'publish'
            ]
        ]);
    }
}
