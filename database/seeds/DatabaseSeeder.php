<?php

use Illuminate\Database\Seeder;
use App\Posts;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(Posts::class, 100)->create();

    }
}
