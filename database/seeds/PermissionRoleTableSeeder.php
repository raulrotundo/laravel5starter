<?php

use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin Role Permissions
        foreach(range(1, 22) as $index) {
            DB::table('permission_role')->insert([
                'permission_id' => $index,
                'role_id' => 1, 
                'created_at' => new \Carbon\Carbon(),
                'updated_at' => new \Carbon\Carbon(),
            ]);
        }

        //Client Role Permissions
        DB::table('permission_role')->insert([
            'permission_id' => 2,
            'role_id' => 1, 
            'created_at' => new \Carbon\Carbon(),
            'updated_at' => new \Carbon\Carbon(),
        ]);
    }
}
