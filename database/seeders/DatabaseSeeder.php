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
        // \App\Models\User::factory(10)->create();
        $this->call(SystemAreaTableSeeder::class);
        $this->call(ToolsMenuTableSeeder::class);
        $this->call(ToolsMenuItemsTableSeeder::class);
        $this->call(ToolsMarkTableSeeder::class);
        $this->call(SystemRoleTableSeeder::class);
        $this->call(ArticleAttributeTableSeeder::class);
        $this->call(ArticleModelTableSeeder::class);
        $this->call(FileDirTableSeeder::class);
        $this->call(FormTableSeeder::class);
    }
}
