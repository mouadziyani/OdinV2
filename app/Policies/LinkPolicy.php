<?php

namespace App\Policies;

use App\Models\Link;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LinkPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Link $link): bool
    {
        return $user->id === $link->user_id // owner
            || $user->roles->contains('name', 'admin') // admin
            || $link->sharedWith->contains($user->id); // shared with user
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->roles->contains('name', 'admin')
            || $user->roles->contains('name', 'editor');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Link $link): bool
    {
        // owner or admin
        if ($user->id === $link->user_id || $user->roles->contains('name', 'admin')) {
            return true;
        }

        // shared with permission edition
        $shared = $link->sharedWith->firstWhere('id', $user->id);
        return $shared && $shared->pivot->permission === 'edition';
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Link $link): bool
    {
        return $user->id === $link->user_id || $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Link $link): bool
    {
        return $user->roles->contains('name', 'admin');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Link $link): bool
    {
        return $user->roles->contains('name', 'admin');
    }
}
