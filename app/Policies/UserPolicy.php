<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('用戶-任意檢視');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Admin $admin, User $model): bool
    {
        return $admin->hasPermissionTo('用戶-檢視');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Admin $admin): bool
    {
        return $admin->hasPermissionTo('用戶-新增');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Admin $admin, User $model): bool
    {
        return $admin->hasPermissionTo('用戶-更新');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Admin $admin, User $model): bool
    {
        return $admin->hasPermissionTo('用戶-刪除');
    }

    /**
     * Filament multiple records delete
     */
    public function deleteAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('用戶-刪除');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Admin $admin, User $model): bool
    {
        return $admin->hasPermissionTo('用戶-還原刪除');
    }

    /**
     * Filament multiple records restore
     */
    public function restoreAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('用戶-任意還原刪除');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Admin $admin, User $model): bool
    {
        return $admin->hasPermissionTo('用戶-強制刪除');
    }

    /**
     * Filament multiple records permanently delete
     */
    public function forceDeleteAny(Admin $admin): bool
    {
        return $admin->hasPermissionTo('用戶-任意強制刪除');
    }
}
