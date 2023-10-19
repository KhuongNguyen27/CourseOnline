<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\GroupSeeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\GroupRoleSeeder;
use App\Models\User;
use App\Models\Course;
use App\Models\UserCourse;
use App\Models\Order;
use App\Models\Category;
use App\Models\Section;
use App\Models\Lession;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(GroupSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(GroupRoleSeeder::class);
        Category::factory(10)->create();    
        User::factory(10)->create();
        Course::factory(10)->create();
        UserCourse::factory(10)->create();
        Order::factory(10)->create();
        Section::factory(10)->create();
        Lession::factory(10)->create();
    }
}
