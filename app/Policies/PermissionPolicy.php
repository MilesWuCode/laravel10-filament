<?php

namespace App\Policies;

use App\Models\Admin;
use ASpatie\Permission\Models\Permission;

class PermissionPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return $admin->can('權限-任意檢視');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, Permission $permission): bool
    {
        return $admin->can('權限-檢視');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return $admin->can('權限-新增');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, Permission $permission): bool
    {
        return $admin->can('權限-更新');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, Permission $permission): bool
    {
        return $admin->can('權限-刪除');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, Permission $permission): bool
    {
        return $admin->can('權限-還原');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, Permission $permission): bool
    {
        return $admin->can('權限-強制刪除');
    }

    /**
     * Filament multiple records delete
     */
    public function deleteAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('權限-任意刪除');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(Admin $admin, Permission $permission): bool
    {
        return $admin->hasPermissionTo('權限-任意還原刪除');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(Admin $admin, Permission $permission): bool
    {
        return $admin->hasPermissionTo('權限-任意強制刪除');
    }
}
