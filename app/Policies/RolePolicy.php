<?php

namespace App\Policies;

use App\Models\Admin;
use Spatie\Permission\Models\Role;

class RolePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return $admin->can('規則-任意檢視');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, Role $role): bool
    {
        return $admin->can('規則-檢視');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return $admin->can('規則-新增');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, Role $role): bool
    {
        return $admin->can('規則-更新');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, Role $role): bool
    {
        return $admin->can('規則-刪除');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, Role $role): bool
    {
        return $admin->can('規則-還原');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, Role $role): bool
    {
        return $admin->can('規則-強制刪除');
    }

    /**
     * Filament multiple records delete
     */
    public function deleteAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('規則-任意刪除');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(Admin $admin, Role $role): bool
    {
        return $admin->hasPermissionTo('規則-任意還原刪除');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(Admin $admin, Role $role): bool
    {
        return $admin->hasPermissionTo('規則-任意強制刪除');
    }
}
