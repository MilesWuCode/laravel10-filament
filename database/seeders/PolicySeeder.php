<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PolicySeeder extends Seeder
{
    /**
     * 新增權限
     * 請參考DefaultPermissionSeeder
     * Run the database seeds.
     */
    public function run(): void
    {
        $guardName = config('auth.defaults.guard');

        // 常用:viewAny,view,create,update,delete
        Permission::firstOrCreate(['name' => '用戶-任意檢視', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '用戶-檢視', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '用戶-新增', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '用戶-更新', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '用戶-刪除', 'guard_name' => $guardName]);

        // 不常使用:forceDelete,restore
        Permission::firstOrCreate(['name' => '用戶-強制刪除', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '用戶-還原刪除', 'guard_name' => $guardName]);

        // 特別:deleteAny,restoreAny,forceDeleteAny
        Permission::firstOrCreate(['name' => '用戶-任意刪除', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '用戶-任意強制刪除', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '用戶-任意還原刪除', 'guard_name' => $guardName]);
    }
}
