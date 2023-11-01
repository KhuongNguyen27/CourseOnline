<?php

namespace App\Policies;

use App\Models\User;

class OrderPolicy
{
    public function viewAny(User $user)
    {
       return $user->hasPermission('Order_viewAny');
    }
    public function view(User $user)
    {
        return $user->hasPermission('Order_view');
    }
    public function create(User $user)
    {
        return $user->hasPermission('Order_create');
    }
    public function update(User $user)
    {
        return $user->hasPermission('Order_update');
    }
    public function delete(User $user)
    {
        return $user->hasPermission('Order_delete');
    }
    public function restore(User $user)
    {
       return $user->hasPermission('Order_restore');
    }
    public function forceDelete(User $user)
    {
        return $user->hasPermission('Order_forceDelete');
    }
    public function viewTrash(User $user)
    {
        return $user->hasPermission('Order_viewTrash');
    }
}