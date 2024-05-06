<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Category;
use App\Models\User;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {

        if ($user->hasPermissionTo('View Post')) {
            return true;
        }

        // Default to false if neither roles nor permission match
        return false;
    }
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Category $post): bool
    {
        if ($user->hasPermissionTo('View Post')) {
            return true;
        }

        // Default to false if neither roles nor permission match
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if ($user->hasPermissionTo('Create Post')) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Category $post): bool
    {
        if ($user->hasPermissionTo('Update Post')) {
            return true;
        }


        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Category $post): bool
    {
        if ($user->hasPermissionTo('Delete Post')) {
            return true;
        }

        // Default to false if neither roles nor permission match
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Category $post): bool
    {
        return $user->hasRole(['Admin', 'Moderator']);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Category $post): bool
    {
        return $user->hasRole(['Admin', 'Moderator']);
    }
}