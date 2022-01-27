<?php

namespace Database\Seeders;

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
        //\App\Models\User::factory(10)->create();
        $this->call([
            MpsTypeTableSeeder::class,
            TopTableSeeder::class,
            StatusTableSeeder::class,
            TopTableSeeder::class,
            PostTableSeeder::class,
            ArticleTableSeeder::class,
            VideoTableSeeder::class,
            DoctorTableSeeder::class,
        ]);
    }
}
