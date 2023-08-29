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

        Permission::firstOrCreate(['name' => '管理員-新增', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '管理員-更新', 'guard_name' => $guardName]);
        Permission::firstOrCreate(['name' => '管理員-刪除', 'guard_name' => $guardName]);
    }
}
