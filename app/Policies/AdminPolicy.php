<?php

namespace App\Policies;

use App\Models\Admin;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('管理員-任意檢視');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, Admin $data): bool
    {
        return $admin->hasPermissionTo('管理員-檢視');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return $admin->hasPermissionTo('管理員-新增');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, Admin $data): bool
    {
        return $admin->hasPermissionTo('管理員-更新');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, Admin $data): bool
    {
        return $admin->hasPermissionTo('管理員-刪除');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, Admin $data): bool
    {
        return $admin->hasPermissionTo('管理員-還原刪除');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, Admin $data): bool
    {
        return $admin->hasPermissionTo('管理員-強制刪除');
    }

    /**
     * Filament multiple records delete
     */
    public function deleteAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('管理員-任意刪除');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(Admin $admin, Admin $data): bool
    {
        return $admin->hasPermissionTo('管理員-任意還原刪除');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(Admin $admin, Admin $data): bool
    {
        return $admin->hasPermissionTo('管理員-任意強制刪除');
    }
}
