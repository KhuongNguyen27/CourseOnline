<?php

namespace App\Policies;

use App\Models\User;

class LevelPolicy
{
    public function viewAny(User $user)
    {
       return $user->hasPermission('Level_viewAny');
    }
    public function view(User $user)
    {
        return $user->hasPermission('Level_view');
    }
    public function create(User $user)
    {
        return $user->hasPermission('Level_create');
    }
    public function update(User $user)
    {
        return $user->hasPermission('Level_update');
    }
    public function delete(User $user)
    {
        return $user->hasPermission('Level_delete');
    }
    public function restore(User $user)
    {
       return $user->hasPermission('Level_restore');
    }
    public function forceDelete(User $user)
    {
        return $user->hasPermission('Level_forceDelete');
    }
    public function viewTrash(User $user)
    {
        return $user->hasPermission('Level_viewTrash');
    }
}