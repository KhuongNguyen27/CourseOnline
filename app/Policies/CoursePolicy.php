<?php

namespace App\Policies;

use App\Models\User;

class CoursePolicy
{
    public function viewAny(User $user)
    {
       return $user->hasPermission('Course_viewAny');
    }
    public function view(User $user)
    {
        return $user->hasPermission('Course_view');
    }
    public function create(User $user)
    {
        return $user->hasPermission('Course_create');
    }
    public function update(User $user)
    {
        return $user->hasPermission('Course_update');
    }
    public function delete(User $user)
    {
        return $user->hasPermission('Course_delete');
    }
    public function restore(User $user)
    {
       return $user->hasPermission('Course_restore');
    }
    public function forceDelete(User $user)
    {
        return $user->hasPermission('Course_forceDelete');
    }
    public function viewTrash(User $user)
    {
        return $user->hasPermission('Course_viewTrash');
    }
}