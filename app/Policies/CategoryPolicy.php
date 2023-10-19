<?php

namespace App\Policies;

use App\Models\User;

class CategoryPolicy
{
    public function viewAny(User $user)
    {
       return $user->hasPermission('Category_viewAny');
    }
    public function view(User $user)
    {
        return $user->hasPermission('Category_view');
    }
    public function create(User $user)
    {
        return $user->hasPermission('Category_create');
    }
    public function update(User $user)
    {
        return $user->hasPermission('Category_update');
    }
    public function delete(User $user)
    {
        return $user->hasPermission('Category_delete');
    }
    public function restore(User $user)
    {
       return $user->hasPermission('Category_restore');
    }
    public function forceDelete(User $user)
    {
        return $user->hasPermission('Category_forceDelete');
    }
    public function viewTrash(User $user)
    {
        return $user->hasPermission('Category_viewTrash');
    }
}