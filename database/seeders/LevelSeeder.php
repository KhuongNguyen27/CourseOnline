<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = ['Basic', 'Advanced', 'Master'];
        $level = 1;
        foreach ($positions as $position) {
            DB::table('levels')->insert([
                'name' => $position,
                'level' => $level
            ]);
            $level++;
        }
    }
}
