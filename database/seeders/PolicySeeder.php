<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $guardName = config('auth.defaults.guard');

        // viewAny
        // view
        // create
        // update
        // delete
        // deleteAny
        // restore
        // restoreAny
        // forceDelete
        // forceDeleteAny
        Permission::firstOrCreate(['name' => '管理員-任意檢視', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '管理員-檢視', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '管理員-新增', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '管理員-更新', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '管理員-刪除', 'guard_name' => $guardName]);

        // 不常使用
        // Permission::firstOrCreate(['name' => '管理員-強制刪除', 'guard_name' => $guardName]);
        // Permission::firstOrCreate(['name' => '管理員-還原刪除', 'guard_name' => $guardName]);

        // 特別
        // Permission::firstOrCreate(['name' => '管理員-任意刪除', 'guard_name' => $guardName]);
        // Permission::firstOrCreate(['name' => '管理員-任意強制刪除', 'guard_name' => $guardName]);
        // Permission::firstOrCreate(['name' => '管理員-任意還原刪除', 'guard_name' => $guardName]);
    }
}
