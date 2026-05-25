<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Warble;
use Illuminate\Auth\Access\Response;

class WarblePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Warble $warble): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Warble $warble): bool
    {
        return $user->id === $warble->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Warble $warble): bool
    {
        return $user->id === $warble->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Warble $warble): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Warble $warble): bool
    {
        return false;
    }
}
