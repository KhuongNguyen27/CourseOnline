<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Role::truncate();
        $table = ['Category','Level','Course','Section','Lession','Group','User','Order'];
        $action = ['viewAny','view','create','update','viewTrash','delete','restore','forceDelete'];
        foreach ($table as $name) {
            foreach ($action as $active) {
                DB::table('roles')->insert(
                    [
                        "name" =>  $name.'_'.$active, 
                        "group_name" => $name 
                    ]
                );
            }
        }
        $permission = new Role();
        $permission->name = "Group_Permission";
        $permission->group_name = "Group";
        $permission->save();
    }
}
